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
        if ($request->type=='writer request') {
            return view('wreq', compact('request'));
        } elseif ($request->type=='comment request') {
            return view('creq', compact('request'));
        } elseif ($request->type=='post request') {
            return view('preq', compact('request'));
        }
    }
    public function requestHandler()
    {
        $request=App::get("requestQuery")->selectAllOneCon('requests', 'id', $this->requestRequest->reqData('reqId'))[0];
        if ($this->requestRequest->reqData('answer')=="no") {
            App::get("requestQuery")->update('requests','allow', 0,'id',$request->id);
            return redirect("mail?id={$request->id_user}&answer=no");
        } else {
            App::get("requestQuery")->update('requests','allow', 1,'id',$request->id);
            
            if ($request->type=='writer request') {
                 return redirect("acceptwriter?id={$request->id_user}");
            } elseif ($request->type=='comment request') {
                return redirect("acceptpost?id={$request->id_article}");
            } elseif ($request->type=='acceptcomment') {
                return redirect("acceptcomment?id={$request->id_comment}");
            }
            return redirect("mail?id={$request->id_user}");
        }
    }
}