<?php



class AuthMiddleware
{

    public static function notLoggedIn()
    {

        session_start();
        if (!isset($_SESSION['email'])) {
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