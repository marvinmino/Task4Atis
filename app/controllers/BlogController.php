<?php

namespace App\Controllers;

use App\Core\App;
class BlogController 
{

    public function home(){
        session_start();
        return view('index');
    }
    public function na(){
        session_start();
        return view('na');
    }
    public function forgotPassword(){
        return view('forgot');
    }
    public function resetPassword(){
        return view('reset');
    }
    public function login()
    {   session_start();
        if(isset($_SESSION['email']))
        header('location:home');
        else
        return view('login');
    }
    public function register()
    {   session_start();
        if(isset($_SESSION['email']))
        return redirect('home');
        return view('register');
    }
    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        header("location:login");
        exit();
    }
    public function error(){
        echo "You're not allowed to access this site";
    }
    public function test(){
        return view('createArticle');
    }
    public function post(){
        return vire('post');
    }
}