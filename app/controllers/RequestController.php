<?php

namespace App\Controllers;

use App\Core\App;
use RequestRequest;

class RequestController
{
    private $requestRequest;
   
    public function __construct($request)
    {
        $this->requestRequest = new RequestRequest($request);
    }
    public function admin()
    {
        session_start();
        $_SESSION['message']='Successfully requested writer role, wait for confirmation';
        App::get("requestQuery")->addRequest($_SESSION['email'], 'writer request', "User {$_SESSION['email']} wants to be a writer");
        return redirect('profile');
    }
    public function post()
    {
        session_start();
        if(empty(App::get("requestQuery")->selectAllOneCon('requests','text',$_SESSION['slug'])))
        App::get("requestQuery")->addRequest($_SESSION['email'], 'post request', $_SESSION['slug']);
        return view('messageReq');
    }
    public function getRequests()
    {
        session_start();
        $userRequests=App::get("requestQuery")->merge('users','requests','id','id_user','0','0');

        return view('request_dash', compact('userRequests'));
    }
    public function reqLoad()
    {
        session_start();
        $request=App::get("requestQuery")->selectAllOneCon('requests', 'id', $this->requestRequest->reqData('reqId'))[0];
        if ($request->type!='post request') {
            return view('wreq', compact('request'));

        } else{
            $article=App::get('requestQuery')->selectAllOneCon('article','slug',$request->text)[0];
            require 'app/views/preq.view.php';
        }
    }
    public function requestHandler()
    {
        $request=App::get("requestQuery")->selectAllOneCon('requests', 'id', $this->requestRequest->reqData('reqId'))[0];
        if ($this->requestRequest->reqData('answer')=="no") {
            App::get("requestQuery")->update('requests','allow', 0,'id',$request->id);
            return redirect("reqDash");
        } else {
            App::get("requestQuery")->update('requests','allow', 1,'id',$request->id);
            if ($request->type=='writer request') {
                 return redirect("acceptwriter?id={$request->id_user}");
            } elseif ($request->type=='post request') {
                return redirect("acceptpost?slug={$request->text}");
            } elseif ($request->type=='comment request') {
                $commentId=explode('@@',$request->text)[0];
                return redirect("acceptcomment?id={$commentId}");
            }
            return redirect("home");
        }
    }
}