<?php

namespace App\Controllers;

use App\Core\App;


class RequestController 
{
    
   public function admin(){
       session_start();
         $_SESSION['message']='Successfully requested writer role, wait for confirmation';
         App::get("requestQuery")->addRequest($_SESSION['email'],'writer request');
         return redirect('profile');
   }
}
