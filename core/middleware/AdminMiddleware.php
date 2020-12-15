<?php



class AdminMiddleware
{

    public function isAdmin()
    {
        if ($_SESSION['user_role'] != 'admin') {
            header("Location: /error");
            return true;
        } else {
            return false;
        }
    }
    public function isNotAdmin(){
        if ($_SESSION['user_role'] != 'reader'){
            header("Location: /error");
            return true;
        } else {
            return false;
        }
    }
}