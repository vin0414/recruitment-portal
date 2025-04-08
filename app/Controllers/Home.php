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
            $accountModel = new \App\Models\accountModel();
            $account = $accountModel->WHERE('email',$this->request->getPost('email'))
                                    ->WHERE('verified',1)->WHERE('status',1)
                                    ->first();
            $checkPassword = Hash::check($this->request->getPost('password'),$account['password']);
            if(empty($checkPassword)|| !$checkPassword)
            {
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
                 return redirect()->to('overview');
            }
        }
    }

    public function logout()
    {
        
    }
}
