<?php

namespace App\Controllers;
use BlogRequest;
use App\Core\App;
class BlogController 
{
    private $request;
   
    public function __construct($request)
    {
        $this->request = new BlogRequest($request);
    }
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
        setcookie('email','');
        setcookie('user_role','');
        setcookie('user_id','');
        header("location:login");
        exit();
    }
    public function error(){
        echo "You're not allowed to access this site";
    }
    public function test(){
       $categories= App::get('categoryQuery')->selectAll('category');
        return view('createArticle',compact('categories'));
    }
    public function post(){
        session_start();
        $article=App::get('articleQuery')->selectAllTwoCon('article','slug',$this->request->reqData('slug'),'status','okay')[0];
        $user=App::get('articleQuery')->selectAllOneCon('users','email',$_SESSION['email'])[0];
        if($user->role!='reader')
        $article=App::get('articleQuery')->selectAllOneCon('article','slug',$this->request->reqData('slug'))[0];
        $tags=App::get('articleQuery')->manytomanytwo('article','articleTags','tags','slug',$this->request->reqData('slug'),'status','okay');
        $comments=App::get('commentQuery')->selectAllTwoCon('comments','accepted',1,'article',$article->id);
        if(($article->status=="okay"||$_SESSION['user_role']=="admin"||$user->id==$article->userId)&&!empty($article))
        require 'app/views/post.view.php';
        else
        return redirect('../home');
    }
    public function sendmailVerify(){
        return view('verified');
    }


}