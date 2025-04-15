<?php

namespace App\Controllers;
use App\Libraries\Hash;

class Home extends BaseController
{
    private $db;
    public function __construct()
    {
        helper(['url','form','text']);
        $this->db = db_connect();
    }

    public function index(): string
    {
        return view('welcome_message');
    }

    //school and division office login

    public function auth()
    {
        return view('auth/login');
    }

    public function checkAuth()
    {
        $validation = $this->validate([
            'csrf_deped'=>'required',
            'email'=>'required|valid_email|is_not_unique[accounts.email]',
            'password'=>'required|min_length[8]|max_length[12]|regex_match[/[A-Z]/]|regex_match[/[a-z]/]|regex_match[/[0-9]/]'
        ]);
        if(!$validation)
        {
            return view('auth/login',['validation'=>$this->validator]);
        }
        else
        {
            if ($this->isLockedOut()) {
                session()->setFlashdata('fail','Too many login attempts. Please try again later.');
                return redirect()->to('/auth')->withInput();
            }
            else
            {
                $accountModel = new \App\Models\accountModel();
                $account = $accountModel->WHERE('email',$this->request->getPost('email'))
                                        ->WHERE('verified',1)->WHERE('status',1)
                                        ->first();
                if(empty($account))
                {
                    $this->increaseLoginAttempts();
                    session()->setFlashdata('fail','Account does not exist. Please try again');
                    return redirect()->to('auth')->withInput();
                }
                else
                {
                    $checkPassword = Hash::check($this->request->getPost('password'),$account['password']);
                    if(empty($checkPassword)|| !$checkPassword)
                    {
                        $this->increaseLoginAttempts();
                        session()->setFlashdata('fail','Invalid Password! Please try again');
                        return redirect()->to('auth')->withInput();
                    }
                    else
                    {
                        $roleModel = new \App\Models\roleModel();
                        $role = $roleModel->WHERE('role_id',$account['role_id'])->first();
                        session()->set('loggedUser', $account['account_id']);
                        session()->set('fullname', $account['fullname']);
                        session()->set('role',$role['role_name']);
                        session()->set('is_logged_in',true);
                        //logs
                        date_default_timezone_set('Asia/Manila');
                        $logModel = new \App\Models\logModel();
                        $data = ['account_id'=>$account['account_id'],
                                'activities'=>'Logged On',
                                'page'=>'Login page',
                                'datetime'=>date('Y-m-d h:i:s a')
                                ];      
                        $logModel->save($data);
                        $this->resetLoginAttempts();
                        return redirect()->to('overview');
                    }
                }
            }
        }
    }

    private function isLockedOut()
    {
        $session = session();

        // Get the login attempts and the time of the last failed attempt
        $attempts = $session->get('login_attempts') ?? 0;
        $lastAttemptTime = $session->get('last_attempt_time');

        // If the user has reached the max attempts, check if they're locked out
        if ($attempts >= 5) {
            // If the last failed attempt was within the last 15 minutes, lock out
            if ($lastAttemptTime && (time() - $lastAttemptTime) < 900) {
                return true;
            }
        }

        return false;
    }

    // Increase the login attempt count
    private function increaseLoginAttempts()
    {
        $session = session();

        // Get current login attempts
        $attempts = $session->get('login_attempts') ?? 0;

        // Increase attempts
        $attempts++;

        // Store the attempts and the time of the last attempt
        $session->set('login_attempts', $attempts);
        $session->set('last_attempt_time', time());

        // If attempts exceed 5, lock out the user
        if ($attempts >= 5) {
            $session->set('lockout_time', time());
        }
    }

    // Reset the login attempt count
    private function resetLoginAttempts()
    {
        $session = session();
        $session->remove('login_attempts');
        $session->remove('last_attempt_time');
    }

    public function logout()
    {
        //logs
        date_default_timezone_set('Asia/Manila');
        $logModel = new \App\Models\logModel();
        $data = ['account_id'=>session()->get('loggedUser'),
                'activities'=>'Logged Out',
                'page'=>'Logout page',
                'datetime'=>date('Y-m-d h:i:s a')
            ];        
        $logModel->save($data);
        if(session()->has('loggedUser'))
        {
            session()->remove('loggedUser');
            session()->destroy();
            return redirect()->to('/auth?access=out')->with('fail', 'You are logged out!');
        }
    }

    //pages
    public function overview()
    {
        $title = "Overview";
        $data = ['title'=>$title];
        return view('main/dashboard',$data);
    }

    public function jobPosting()
    {
        $title = "Job Posting";
        $data = ['title'=>$title];
        return view('main/job-posting',$data);
    }

    public function pointSystem()
    {
        $title = "Point System";
        $data = ['title'=>$title];
        return view('main/point-system',$data);
    }

    //accounts
    public function manageAccount()
    {   
        $title = "Accounts";
        $data = ['title'=>$title];
        return view('main/manage-account',$data);
    }

    public function fetchAccount()
    {
        $accountModel = new \App\Models\accountModel();
        $searchTerm = $_GET['search']['value'] ?? ''; 
        $builder = $this->db->table('accounts a');
        $builder->select('a.*,b.role_name');
        $builder->join('user_role b', 'b.role_id = a.role_id', 'LEFT');
        $builder->groupBy('a.account_id');

        // Apply search filter if a search term exists
        if ($searchTerm) {
            // Add a LIKE condition to filter based on school name or address or any other column you wish to search
            $builder->groupStart()
                    ->like('a.fullname', $searchTerm)
                    ->orLike('a.email', $searchTerm)
                    ->orLike('b.role_name', $searchTerm)
                    ->groupEnd();
        }

        // Execute the query and fetch the results
        $account = $builder->get()->getResult();

        // Total number of filtered records (with search filter applied)
        $filteredRecords = count($account);

        $totalRecords = $accountModel->countAllResults();

        $response = [
            "draw" => $_GET['draw'],
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $filteredRecords,
            'data' => [] 
        ];
        foreach ($account as $row) {
            $response['data'][] = [
                'id' =>$row->account_id,
                'fullname' => $row->fullname,
                'email' => $row->email,
                'role' => $row->role_name,
                'status' =>($row->status == 0) ? '<span class="badge bg-danger text-white">Inactive</span>' : 
                            '<span class="badge bg-success text-white">Active</span>',
                'verify'=>($row->verified== 0) ? '<span class="badge bg-danger text-white">No</span>' : 
                            '<span class="badge bg-success text-white">Yes</span>',
                'action' => ($row->status == 1) 
                ? '<a href="' . site_url("edit-account") . '/' . $row->token . '" class="btn btn-primary"><i class="ti ti-edit"></i> Edit </a>&nbsp;<button type="button" class="btn btn-secondary reset" value="' . $row->account_id . '"><i class="ti ti-refresh"></i> Reset </button>' 
                : '<a href="' . site_url("edit-account") . '/' . $row->token . '" class="btn btn-primary"><i class="ti ti-edit"></i> Edit </a>'
            ];
        }
        // Return the response as JSON
        return $this->response->setJSON($response);
    }

    public function createAccount()
    {
        $title = "Create Account";
        //role
        $roleModel = new \App\Models\roleModel();
        $role = $roleModel->findAll();
        //office
        $officeModel = new \App\Models\officeModel();
        $office = $officeModel->findAll();
        //recent
        $accountModel = new \App\Models\accountModel();
        $recentAccount = $accountModel->orderBy('account_id','DESC')->limit(5)->findAll();
        
        $data = ['title'=>$title,'role'=>$role,'recent'=>$recentAccount,'office'=>$office];
        return view('main/create-account',$data);
    }

    public function editAccount($id)
    {
        $title = "Edit Account";
        //role
        $roleModel = new \App\Models\roleModel();
        $role = $roleModel->findAll();
        //office
        $officeModel = new \App\Models\officeModel();
        $office = $officeModel->findAll();
        //account
        $accountModel = new \App\Models\accountModel();
        $account = $accountModel->WHERE('token',$id)->first();

        $data = ['title'=>$title,'role'=>$role,'office'=>$office,'account'=>$account];
        return view('main/edit-account',$data);
    }

    public function saveAccount()
    {
        $accountModel = new \App\Models\accountModel();
        $passwordModel = new \App\Models\passwordModel();
        $validation = $this->validate([
            'csrf_deped'=>'required',
            'fullname'=>'required|is_unique[accounts.fullname]',
            'email'=>'required|valid_email|is_unique[accounts.email]',
            'role'=>'required',
            'office'=>'required'
        ]);

        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            function generateRandomString($length = 64) {
                // Generate random bytes and convert them to hexadecimal
                $bytes = random_bytes($length);
                return substr(bin2hex($bytes), 0, $length);
            }
            $token_code = generateRandomString(64);
            //get the default password
            $password = $passwordModel->first();

            $data = ['role_id'=>$this->request->getPost('role'),
                    'school_id'=>$this->request->getPost('office'),
                    'email'=>$this->request->getPost('email'),
                    'password'=>$password['password'],
                    'fullname'=>$this->request->getPost('fullname'),
                    'status'=>1,
                    'verified'=>0,
                    'token'=>$token_code,
                    'date_created'=>date('Y-m-d')];
            $accountModel->save($data);

            if ($this->request->getPost('agree') !== null)
            {
                //send email verification
                $email = \Config\Services::email();
                $email->setTo($this->request->getPost('email'));
                $email->setFrom("vinmogate@gmail.com","HR Recruitment Portal");
                $imgURL = "assets/images/deped-gentri-logo.webp";
                $email->attach($imgURL);
                $cid = $email->setAttachmentCID($imgURL);
                $template = "<center>
                <img src='cid:". $cid ."' width='100'/>
                <table style='padding:20px;background-color:#ffffff;' border='0'><tbody>
                <tr><td><center><h1>Account Verification</h1></center></td></tr>
                <tr><td><center>Hi, ".$this->request->getPost('fullname')."</center></td></tr>
                <tr><td><p><center>Please click the link below to activate your account.</center></p></td><tr>
                <tr><td><center><b>".anchor('verify/'.$token_code,'Verify Account')."</b></center></td></tr>
                <tr><td><p><center>If you did not sign-up in HR Recruitment Website,<br/> please ignore this message or contact us @ division.gentri@deped.gov.ph</center></p></td></tr>
                <tr><td><center>IT Support</center></td></tr></tbody></table></center>";
                $subject = "Account Verification | HR Recruitment Portal";
                $email->setSubject($subject);
                $email->setMessage($template);
                $email->send();
            }
            //logs
            date_default_timezone_set('Asia/Manila');
            $logModel = new \App\Models\logModel();
            $data = ['account_id'=>session()->get('loggedUser'),
                    'activities'=>'Added new account for '.$this->request->getPost('fullname'),
                    'page'=>'Create Account',
                    'datetime'=>date('Y-m-d h:i:s a')
                    ];      
            $logModel->save($data);
            return $this->response->SetJSON(['success' => 'Successfully added']);
        }
    }

    public function modifyAccount()
    {
        $accountModel = new \App\Models\accountModel();
        $validation = $this->validate([
            'csrf_deped'=>'required',
            'fullname'=>'required',
            'email'=>'required|valid_email',
            'role'=>'required',
            'office'=>'required'
        ]);

        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            $id = $this->request->getPost('account_id');
            $data = ['role_id'=>$this->request->getPost('role'),
                    'school_id'=>$this->request->getPost('office'),
                    'email'=>$this->request->getPost('email'),
                    'fullname'=>$this->request->getPost('fullname'),
                    'status'=>$this->request->getPost('status'),
                    'verified'=>$this->request->getPost('verified'),];
            $accountModel->update($id,$data);
            //logs
            date_default_timezone_set('Asia/Manila');
            $logModel = new \App\Models\logModel();
            $data = ['account_id'=>session()->get('loggedUser'),
                    'activities'=>'Modify the account of '.$this->request->getPost('fullname'),
                    'page'=>'Edit Account',
                    'datetime'=>date('Y-m-d h:i:s a')
                    ];      
            $logModel->save($data);
            return $this->response->SetJSON(['success' => 'Successfully applied changes']);
        }
    }

    public function verifyAccount($id)
    {
        $accountModel = new \App\Models\accountModel();
        $account = $accountModel->WHERE('Token',$id)->WHERE('status',1)->first();
        $values = ['verified'=>1];
        $accountModel->update($account['account_id'],$values);
        session()->set('loggedUser', $account['account_id']);
        session()->set('fullname', $account['fullname']);
        session()->set('is_logged_in',true);
        return $this->response->redirect(site_url('/overview'));
    }

    public function resetAccount()
    {
        $accountModel = new \App\Models\accountModel();
        $passwordModel = new \App\Models\passwordModel();
        $password = $passwordModel->first();
        $val = $this->request->getPost('value');
        $data = ['password'=>$password['password']];
        $accountModel->update($val,$data);
        //logs
        date_default_timezone_set('Asia/Manila');
        $logModel = new \App\Models\logModel();
        $data = ['account_id'=>session()->get('loggedUser'),
                'activities'=>'Reset account password',
                'page'=>'Manage Account',
                'datetime'=>date('Y-m-d h:i:s a')
                ];      
        $logModel->save($data);
        return $this->response->SetJSON(['success' => 'Successfully reset']);
    }

    //settings 
    public function settings()
    {
        $title = "Settings";
        //logs
        $builder = $this->db->table('logs a');
        $builder->select('a.*,b.fullname');
        $builder->join('accounts b','b.account_id=a.account_id','LEFT');
        $logs = $builder->get()->getResult();
        //get the academic level
        $academicModel = new \App\Models\academicModel();
        $academic = $academicModel->findAll();

        $data = ['title'=>$title,'logs'=>$logs,'academic'=>$academic];
        return view('main/settings',$data);
    }

    public function saveCategory()
    {
        $validation = $this->validate([
            'csrf_deped'=>'required',
            'category'=>'required|is_unique[application.application_name]',
            'category_code'=>'required|is_unique[application.code]',
        ]);

        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            $mainModel = new \App\Models\mainModel();
            $data = ['application_name'=>$this->request->getPost('category'),
                    'code'=>$this->request->getPost('category_code'),
                    'date_created'=>date('Y-m-d'),
                    'account_id'=>session()->get('loggedUser')
                ];
            $mainModel->save($data);
            //logs
            date_default_timezone_set('Asia/Manila');
            $logModel = new \App\Models\logModel();
            $data = ['account_id'=>session()->get('loggedUser'),
                    'activities'=>'Added new category of '.$this->request->getPost('category'),
                    'page'=>'Settings',
                    'datetime'=>date('Y-m-d h:i:s a')
                    ];      
            $logModel->save($data);
            return $this->response->SetJSON(['success' => 'Successfully added']);
        }
    }

    public function fetchApp()
    {
        $searchTerm = $_GET['search']['value'] ?? ''; 
        $mainModel = new \App\Models\mainModel();
        if ($searchTerm) {
            $mainModel->like('application_name', $searchTerm); // Assuming you're searching on the 'subjectName' column
        }

        $appTitle = $mainModel->findAll();

        $totalRecords = $mainModel->countAllResults();

        $mainModel->like('application_name', $searchTerm);
        $totalFiltered = $mainModel->countAllResults();

        $response = [
            "draw" => $_GET['draw'],
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalFiltered,
            'data' => [] 
        ];
        foreach ($appTitle as $row) {
            $response['data'][] = [
                'title'=>$row['application_name'],
                'code' =>$row['code'],
                'action' => '<button class="btn btn-success editApp" value="' . $row['application_id'] . '"><i class="ti ti-edit"></i>&nbsp;Edit</button>'
            ];
        }
        // Return the response as JSON
        return $this->response->setJSON($response);
    }

    public function saveTypes()
    {
        $academicModel = new \App\Models\academicModel();
        $validation = $this->validate([
            'csrf_deped'=>'required',
            'office_name'=>'required|is_unique[academic_category.academic_name]',
            'office_code'=>'required|is_unique[academic_category.code]'
        ]);

        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            $data = ['academic_name'=>$this->request->getPost('office_name'),
                    'code'=>$this->request->getPost('office_code'),
                    'date_created'=>date('Y-m-d'),
                    'account_id'=>session()->get('loggedUser')];
            $academicModel->save($data);
            //logs
            date_default_timezone_set('Asia/Manila');
            $logModel = new \App\Models\logModel();
            $data = ['account_id'=>session()->get('loggedUser'),
                    'activities'=>'Added type of office : '.$this->request->getPost('office_name'),
                    'page'=>'Settings',
                    'datetime'=>date('Y-m-d h:i:s a')
                    ];      
            $logModel->save($data);
            return $this->response->SetJSON(['success' => 'Successfully added']);
        }
    }

    public function fetchTypes()
    {
        $searchTerm = $_GET['search']['value'] ?? ''; 
        $academicModel = new \App\Models\academicModel();
        if ($searchTerm) {
            $academicModel->like('academic_name', $searchTerm)->orlike('code', $searchTerm);
        }

        $academic = $academicModel->findAll();

        $totalRecords = $academicModel->countAllResults();

        $academicModel->like('academic_name', $searchTerm)->orlike('code', $searchTerm);
        $totalFiltered = $academicModel->countAllResults();

        $response = [
            "draw" => $_GET['draw'],
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalFiltered,
            'data' => [] 
        ];
        foreach ($academic as $row) {
            $response['data'][] = [
                'title'=>$row['academic_name'],
                'code' =>$row['code'],
                'action' => '<button class="btn btn-success editType" value="' . $row['academic_id'] . '"><i class="ti ti-edit"></i>&nbsp;Edit</button>'
            ];
        }
        // Return the response as JSON
        return $this->response->setJSON($response);
    }

    public function saveRole()
    {
        $roleModel = new \App\Models\roleModel();
        $validation = $this->validate([
            'csrf_deped'=>'required',
            'role'=>'required|is_unique[user_role.role_name]',
            'point_rule'=>'required|',
            'settings'=>'required',
            'job_posting'=>'required',
            'user_management'=>'required',
            'tracking'=>'required'
        ]);

        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            $data =  ['role_name'=>$this->request->getPost('role'),
                    'point-system'=>$this->request->getPost('point_rule'),
                    'settings'=>$this->request->getPost('settings'),
                    'posting'=>$this->request->getPost('job_posting'),
                    'users'=>$this->request->getPost('user_management'),
                    'monitoring'=>$this->request->getPost('tracking'),
                    'date_created'=>date('Y-m-d')];
            $roleModel->save($data);
            //logs
            date_default_timezone_set('Asia/Manila');
            $logModel = new \App\Models\logModel();
            $data = ['account_id'=>session()->get('loggedUser'),
                    'activities'=>'Added new role of '.$this->request->getPost('role'),
                    'page'=>'Settings',
                    'datetime'=>date('Y-m-d h:i:s a')
                    ];      
            $logModel->save($data);
            return $this->response->SetJSON(['success' => 'Successfully added']);
        }
    }

    public function fetchRole()
    {
        $searchTerm = $_GET['search']['value'] ?? ''; 
        $roleModel = new \App\Models\roleModel();
        if ($searchTerm) {
            $roleModel->like('role_name', $searchTerm); // Assuming you're searching on the 'subjectName' column
        }

        $role = $roleModel->findAll();

        $totalRecords = $roleModel->countAllResults();

        $roleModel->like('role_name', $searchTerm);
        $totalFiltered = $roleModel->countAllResults();

        $response = [
            "draw" => $_GET['draw'],
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalFiltered,
            'data' => [] 
        ];
        foreach ($role as $row) {
            $response['data'][] = [
                'role'=>$row['role_name'],
                'points' =>($row['point-system']==1) ? 'Yes' : 'No',
                'setting' =>($row['settings']==1) ? 'Yes' : 'No',
                'posting' =>($row['posting']==1) ? 'Yes' : 'No',
                'users' =>($row['users']==1) ? 'Yes' : 'No',
                'tracking' =>($row['monitoring']==1) ? 'Yes' : 'No',
                'action' => '<button class="btn btn-success editRole" value="' . $row['role_id'] . '"><i class="ti ti-edit"></i>&nbsp;Edit</button>'
            ];
        }
        // Return the response as JSON
        return $this->response->setJSON($response);
    }

    public function editRole()
    { 
        $val = $this->request->getGet('value');
        $roleModel = new \App\Models\roleModel();
        $role = $roleModel->WHERE('role_id',$val)->first();
        $data = [
            'id'=>$role['role_id'],
            'role'=>$role['role_name']
        ];
        return $this->response->SetJSON($data);
    }

    public function updateRole()
    {
        $roleModel = new \App\Models\roleModel();
        $validation = $this->validate([
            'csrf_deped'=>'required',
            'role'=>'required',
            'point_rule'=>'required|',
            'settings'=>'required',
            'job_posting'=>'required',
            'user_management'=>'required',
            'tracking'=>'required'
        ]);

        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            $id = $this->request->getPost('role_id');
            $data =  ['role_name'=>$this->request->getPost('role'),
                    'point-system'=>$this->request->getPost('point_rule'),
                    'settings'=>$this->request->getPost('settings'),
                    'posting'=>$this->request->getPost('job_posting'),
                    'users'=>$this->request->getPost('user_management'),
                    'monitoring'=>$this->request->getPost('tracking')];
            $roleModel->update($id,$data);
            //logs
            date_default_timezone_set('Asia/Manila');
            $logModel = new \App\Models\logModel();
            $data = ['account_id'=>session()->get('loggedUser'),
                    'activities'=>'Apply changes in '.$this->request->getPost('role'),
                    'page'=>'Settings',
                    'datetime'=>date('Y-m-d h:i:s a')
                    ];      
            $logModel->save($data);
            return $this->response->SetJSON(['success' => 'Successfully applied changes']);
        }
    }

    public function fetchCourses()
    {
        $searchTerm = $_GET['search']['value'] ?? ''; 
        $courseModel = new \App\Models\courseModel();
        if ($searchTerm) {
            $courseModel->like('education_name', $searchTerm)->orLike('education_code',$searchTerm);
        }

        $course = $courseModel->findAll();

        $totalRecords = $courseModel->countAllResults();

        $courseModel->like('education_name', $searchTerm)->orLike('education_code',$searchTerm);
        $totalFiltered = $courseModel->countAllResults();

        $response = [
            "draw" => $_GET['draw'],
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalFiltered,
            'data' => [] 
        ];
        foreach ($course as $row) {
            $response['data'][] = [
                'course'=>$row['education_name'],
                'code'=>$row['education_code'],
                'action' => '<button class="btn btn-success editCourse" value="' . $row['courses_id'] . '"><i class="ti ti-edit"></i>&nbsp;Edit</button>'
            ];
        }
        // Return the response as JSON
        return $this->response->setJSON($response);
    }

    public function saveCourse()
    {
        $validation = $this->validate([
            'csrf_deped'=>'required',
            'course'=>'required|is_unique[courses.education_name]',
            'course_code'=>'required|is_unique[courses.education_code]',
        ]);

        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            $courseModel = new \App\Models\courseModel();
            $data = ['education_name'=>$this->request->getPost('course'),
                    'education_code'=>$this->request->getPost('course_code'),
                    'date_created'=>date('Y-m-d'),
                    'account_id'=>session()->get('loggedUser')
                ];
            $courseModel->save($data);
            //logs
            date_default_timezone_set('Asia/Manila');
            $logModel = new \App\Models\logModel();
            $data = ['account_id'=>session()->get('loggedUser'),
                    'activities'=>'Added new course of '.$this->request->getPost('course'),
                    'page'=>'Settings',
                    'datetime'=>date('Y-m-d h:i:s a')
                    ];      
            $logModel->save($data);
            return $this->response->SetJSON(['success' => 'Successfully added']);
        }
    }

    public function editCourse()
    {
        $val = $this->request->getGet('value');
        $courseModel = new \App\Models\courseModel();
        $course = $courseModel->WHERE('courses_id',$val)->first();
        $data = [
            'id'=>$course['courses_id'],
            'name'=>$course['education_name'],
            'code'=>$course['education_code']
        ];
        return $this->response->SetJSON($data);
    }

    public function updateCourse()
    {
        $validation = $this->validate([
            'csrf_deped'=>'required',
            'course'=>'required',
            'course_code'=>'required',
        ]);

        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            $courseModel = new \App\Models\courseModel();
            $id = $this->request->getPost('course_id');
            $data = ['education_name'=>$this->request->getPost('course'),
                    'education_code'=>$this->request->getPost('course_code'),
                ];
            $courseModel->update($id,$data);
            //logs
            date_default_timezone_set('Asia/Manila');
            $logModel = new \App\Models\logModel();
            $data = ['account_id'=>session()->get('loggedUser'),
                    'activities'=>'Update the course of '.$this->request->getPost('course'),
                    'page'=>'Settings',
                    'datetime'=>date('Y-m-d h:i:s a')
                    ];      
            $logModel->save($data);
            return $this->response->SetJSON(['success' => 'Successfully applied Changes']);
        }
    }

    public function fetchOffice()
    {
        $searchTerm = $_GET['search']['value'] ?? ''; 
        $officeModel = new \App\Models\officeModel();
        if ($searchTerm) {
            $officeModel->like('school_name', $searchTerm)
                        ->orlike('code', $searchTerm);
        }

        $office = $officeModel->findAll();

        $totalRecords = $officeModel->countAllResults();

        $officeModel->like('school_name', $searchTerm)->orlike('code', $searchTerm);
        $totalFiltered = $officeModel->countAllResults();

        $response = [
            "draw" => $_GET['draw'],
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalFiltered,
            'data' => [] 
        ];
        foreach ($office as $row) {
            $response['data'][] = [
                'office'=>$row['school_name'],
                'code' =>$row['code'],
                'action' => '<button class="btn btn-success editOffice" value="' . $row['school_id'] . '"><i class="ti ti-edit"></i>&nbsp;Edit</button>'
            ];
        }
        // Return the response as JSON
        return $this->response->setJSON($response);
    }

    public function saveOffice()
    {
        $validation = $this->validate([
            'csrf_deped'=>'required',
            'office'=>'required|is_unique[schools.school_name]',
            'code'=>'required|is_unique[schools.code]',
            'type_office'=>'required',
        ]);

        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            $officeModel = new \App\Models\officeModel();
            $data = ['school_name'=>$this->request->getPost('office'),
                    'academic_id'=>$this->request->getPost('type_office'),
                    'code'=>$this->request->getPost('code'),
                    'date_created'=>date('Y-m-d'),
                    'account_id'=>session()->get('loggedUser')];
            $officeModel->save($data);
            //logs
            date_default_timezone_set('Asia/Manila');
            $logModel = new \App\Models\logModel();
            $data = ['account_id'=>session()->get('loggedUser'),
                    'activities'=>'Added new office of '.$this->request->getPost('office'),
                    'page'=>'Settings',
                    'datetime'=>date('Y-m-d h:i:s a')
                    ];      
            $logModel->save($data);
            return $this->response->SetJSON(['success' => 'Successfully added']);
        }
    }

    public function editOffice()
    {
        $val = $this->request->getGet('value');
        $officeModel = new \App\Models\officeModel();
        $office = $officeModel->WHERE('school_id',$val)->first();
        $data = [
            'id'=>$office['school_id'],
            'school'=>$office['school_name'],
            'code'=>$office['code'],
            'academic'=>$office['academic_id']
        ];
        return $this->response->SetJSON($data);
    }

    public function updateOffice()
    {
        $validation = $this->validate([
            'csrf_deped'=>'required',
            'office'=>'required',
            'code'=>'required',
            'type_office'=>'required',
        ]);

        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            $officeModel = new \App\Models\officeModel();
            $id = $this->request->getPost('office_id');
            $data = ['school_name'=>$this->request->getPost('office'),
                    'academic_id'=>$this->request->getPost('type_office'),
                    'code'=>$this->request->getPost('code')];
            $officeModel->update($id,$data);
            //logs
            date_default_timezone_set('Asia/Manila');
            $logModel = new \App\Models\logModel();
            $data = ['account_id'=>session()->get('loggedUser'),
                    'activities'=>'Update the office of '.$this->request->getPost('office'),
                    'page'=>'Settings',
                    'datetime'=>date('Y-m-d h:i:s a')
                    ];      
            $logModel->save($data);
            return $this->response->SetJSON(['success' => 'Successfully applied changes']);
        }
    }

    public function systemPassword()
    {
        $validation = $this->validate([
            'csrf_deped'=>'required',
            'password'=>'required|min_length[8]|max_length[12]|regex_match[/[A-Z]/]|regex_match[/[a-z]/]|regex_match[/[0-9]/]'
        ]);

        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            $passwordModel = new \App\Models\passwordModel();
            $password = $passwordModel->first();
            $defaultPassword = Hash::make($this->request->getPost('password'));
            if(empty($password)):  
                $data = ['password'=>$defaultPassword,
                        'date_created'=>date('Y-m-d'),
                        'account_id'=>session()->get('loggedUser')];
                $passwordModel->save($data);
            else :
                $data = ['password'=>$defaultPassword];
                $passwordModel->update($password['password_id'],$data);
            endif;
            //logs
            date_default_timezone_set('Asia/Manila');
            $logModel = new \App\Models\logModel();
            $data = ['account_id'=>session()->get('loggedUser'),
                    'activities'=>'Create new system password',
                    'page'=>'Settings',
                    'datetime'=>date('Y-m-d h:i:s a')
                    ];      
            $logModel->save($data);
            
            return $this->response->SetJSON(['success' => 'Successfully applied changes']);
        }
    }

    public function fetchCompetence()
    {
        $searchTerm = $_GET['search']['value'] ?? ''; 
        $competenceModel = new \App\Models\competenceModel();
        if ($searchTerm) {
            $competenceModel->like('eligibility_name', $searchTerm)
                        ->orlike('code', $searchTerm);
        }

        $competence = $competenceModel->findAll();

        $totalRecords = $competenceModel->countAllResults();

        $competenceModel->like('eligibility_name', $searchTerm);
        $totalFiltered = $competenceModel->countAllResults();

        $response = [
            "draw" => $_GET['draw'],
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalFiltered,
            'data' => [] 
        ];
        foreach ($competence as $row) {
            $response['data'][] = [
                'id'=>$row['eligibility_id'],
                'title'=>$row['eligibility_name'],
                'date' =>date('M d Y',strtotime($row['date_created'])),
                'action' => '<button class="btn btn-success editCompetence" value="' . $row['eligibility_id'] . '"><i class="ti ti-edit"></i>&nbsp;Edit</button>'
            ];
        }
        // Return the response as JSON
        return $this->response->setJSON($response);
    }

    public function saveCompetence()
    {
        $competenceModel = new \App\Models\competenceModel();
        $validation = $this->validate([
            'csrf_deped'=>'required',
            'title'=>'required|is_unique[eligibilities.eligibility_name]'
        ]);   

        if(!$validation)
        {
            return $this->response->setJSON(['error'=>$this->validator->getErrors()]);
        }
        else
        {
            $data =  ['eligibility_name'=>$this->request->getPost('title'),
                        'date_created'=>date('Y-m-d'),
                        'account_id'=>session()->get('loggedUser')];
            $competenceModel->save($data);
            //logs
            date_default_timezone_set('Asia/Manila');
            $logModel = new \App\Models\logModel();
            $data = ['account_id'=>session()->get('loggedUser'),
                    'activities'=>'Added new competency : '.$this->request->getPost('title'),
                    'page'=>'Settings',
                    'datetime'=>date('Y-m-d h:i:s a')
                    ];      
            $logModel->save($data);
            return $this->response->SetJSON(['success' => 'Successfully added']);
        }
    }

    public function myAccount()
    {
        $title = "My Account";
        //account
        $accountModel = new \App\Models\AccountModel();
        $account = $accountModel->WHERE('account_id',session()->get('loggedUser'))->first();

        $data = ['title'=>$title,'account'=>$account];
        return view('main/my-account',$data);
    }
}