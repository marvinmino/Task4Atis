<?php

namespace App\Controllers;

use App\Core\App;
use UserRequest;

class UsersController 
{
    private $userRequest;
   
    public function __construct($request){
        $this->userRequest = new UserRequest($request);
    }
    
    public function store()
    { 
        session_start();
        $this->userRequest->regAuth();
            App::get('userQuery')->register(
            $this->userRequest->reqData('email'),
            $this->userRequest->reqData('password1')
        );
        $this->userRequest->verifyMail(App::get('key'), App::get('userQuery')->selectAllOneCon('users','email',$this->userRequest->reqData('email'))[0]);
        return redirect('home');
        }    
     
    public function login()
    {   
        session_start();
        $this->userRequest->logAuth();
         if (empty($_SESSION['error'])) 
         App::get('userQuery')->login(
                $this->userRequest->reqData('email'),
                $this->userRequest->reqData('password1'),
                $this->userRequest->reqData('remember'));
    }
    
    public function verify()
    {   session_start();
        $token = $this->userRequest->reqData('token');
        App::get('userQuery')->verify($token);
       
    }
    public function forgot()
    {   
        session_start();
       if(!App::get('userQuery')->findUser('email',$this->userRequest->reqData('email'))[0]){
        $_SESSION['message']='We have send a link to your email';
        return redirect('forgot');
       }
       $token = openssl_random_pseudo_bytes(16);
       $token = bin2hex($token);
       App::get('userQuery')->update('users','tokenReset',$token,'email',$this->userRequest->reqData('email'));
       $this->userRequest->resetPasswordMail(App::get('key'), App::get('userQuery')->findUser('email',$this->userRequest->reqData('email'))[0]);
       $_SESSION['message']='We have send a link to your email';
       return redirect('forgot');
    }
    public function resetLink(){
        session_start();
            $token = $this->userRequest->reqData('token');
            App::get("userQuery")->resetAuth($token);
            if(!isset($_SESSION['error'])&&$token!=1)
            {   
                $_SESSION['token']=$token;
                return view('reset');
            }
            else
            {   
                $_SESSION['error']="Link expired or no longer existent";
                return redirect('login');
            }
    }
    public function reset(){
        session_start();
        if (isset($_SESSION['token'])) {
            $this->userRequest->resetAuth();
            App::get("userQuery")->resetAuth($_SESSION['token']);
            if (empty($_SESSION['error'])) {
            App::get("userQuery")->reset($_SESSION['token'], $this->userRequest->reqData('password1'));
            $_SESSION['error']="Please login with your new password";
            return redirect('login');
        }
        }
        else 
        return redirect('login');
    }
    public function profile(){
        session_start();
        $user=App::get("userQuery")->findUser('email',$_SESSION['email'])[0];
        return view('profile',compact('user'));
    }
}