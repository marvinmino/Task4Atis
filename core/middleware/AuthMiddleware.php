<?php



class AuthMiddleware
{

    public static function notLoggedIn()
    {

        session_start();
        if (!isset($_SESSION['email'])) {
            if(isset($_COOKIE['email']))
            {   
                $_SESSION['email']=openssl_decrypt($_COOKIE['email'], "AES-128-ECB", 'passwordssl');
                if (isset($_COOKIE['user_role'])) {
                    $_SESSION['user_role']=openssl_decrypt($_COOKIE['user_role'], "AES-128-ECB", 'passwordssl');
                }
                if (isset($_COOKIE['user_role'])) {
                    $_SESSION['user_i']=openssl_decrypt($_COOKIE['user_id'], "AES-128-ECB", 'passwordssl');
                }
            }
            else
            header("Location: /error");
            return true;
        } else {
            return false;
        }
    }

    public static function loggedIn()
    {

        session_start();
        if (isset($_SESSION['email'])) {
            header("Location: /home");
            return true;
        } else {
            return false;
        }
    }
}  