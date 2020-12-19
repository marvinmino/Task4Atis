<?php

namespace App\Core\Repository;

use PDO;

class UserRepository extends RepositoryBuilder
{
    protected $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function register($email, $password)
    {
        session_start();
        $token = openssl_random_pseudo_bytes(16);
        $token = bin2hex($token);
        if (empty($this->selectAllOneCon('users', 'email', $email))) {
            $this->insert('users', [
                'email'     =>     $email,
                'password'  => md5($password),
                'token'     =>     $token,
            ]);
        } else {
            session_start();
            $_SESSION['error'] = "User with the same email already exists";
            return redirect('register');
        }
    }
    public function login($email, $password, $remember)
    { session_start();
        $user=$this->selectAllTwoCon('users', 'email', $email, 'password', md5($password))[0];
        if (empty($user)) {
            $_SESSION['error'] = "No email/password combination exists";
            return redirect('login');
        } else {
            // if (isset($remember)) {
            //     //COOKIES for username
            //     setcookie("email", $email, time() + (10 * 365 * 24 * 60 * 60));
            //     //COOKIES for password
            //     setcookie("password", $password, time() + (10 * 365 * 24 * 60 * 60));
            // } else {
            //     if (isset($_COOKIE["email"])) {
            //         setcookie("email", "");
            //         if (isset($_COOKIE["password"])) {
            //             setcookie("password", "");
            //         }
            //     }
            // }
            if ($user->verified==1) {
                $_SESSION['email'] = $email;
                $_SESSION['user_role']=$user->role;
                $_SESSION["uid"]=$user->id;
                return redirect('home');
            }
            else 
            {
                $_SESSION['emailver'] = $email;
                return redirect('sendmailverify');
            }
        }
    }

    public function verify($token)
    {
        if (isset($token)) {
            $user = $this->selectAllOneCon('users', 'token', $token);
            if (!empty($user) && $token != 1) {
                session_start();
                $this->update('users', 'verified', '1', 'token', $token);
                $this->update('users', 'token', '1', 'verified', '1');
                $_SESSION['message'] = 'You succesfully verified your account';
                return redirect('home');
            } else
                header('location:https://www.youtube.com/watch?v=dQw4w9WgXcQ&list=PLahKLy8pQdCM0SiXNn3EfGIXX19QGzUG3 ');
        }
    }

    public function findUser($con, $conval)
    {

        if (!empty($this->selectAllOneCon('users', $con, $conval)))
            return ($this->selectAllOneCon('users', $con, $conval));
        else
            return false;
    }
    public function resetAuth($token)
    {
        if (!$this->findUser('tokenReset', $token)) {
            $_SESSION['error'] = "You tried to enter an incorrect token";
        }
    }

    public function reset($token, $password)
    {
        $this->update('users', 'password', md5($password), 'tokenReset', $token);
        $this->update('users', 'tokenReset', '1', 'tokenReset', $token);
    }
}
