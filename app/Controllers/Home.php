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
}
