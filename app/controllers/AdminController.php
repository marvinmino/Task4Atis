<?php

namespace App\Controllers;

use App\Core\App;
use UserRequest;

class AdminController 
{
    private $userRequest;
   
    public function __construct($request){
        $this->userRequest = new UserRequest($request);
    }

    public function dashboard()
    { 
        $users=App::get('userQuery')->selectAll('users');
        return view('user_dash',compact('users'));
    }

}
