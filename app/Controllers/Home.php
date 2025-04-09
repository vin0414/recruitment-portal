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
                $checkPassword = Hash::check($this->request->getPost('password'),$account['password']);
                if(empty($checkPassword)|| !$checkPassword)
                {
                    $this->increaseLoginAttempts();
                    session()->setFlashdata('fail','Invalid Password! Please try again');
                    return redirect()->to('auth')->withInput();
                }
                else
                {
                    session()->set('loggedUser', $account['account_id']);
                    session()->set('fullname', $account['fullname']);
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
        $data = ['title'=>$title];
        return view('main/create-account',$data);
    }

    public function editAccount($id)
    {
        $title = "Edit Account";
        $data = ['title'=>$title];
        return view('main/edit-account',$data);
    }

    //settings 
    public function settings()
    {
        $title = "Settings";
        $data = ['title'=>$title];
        return view('main/settings',$data);
    }
}