<?php

namespace App\Controllers;

use App\Core\App;
use RequestRequest;

class RequestController 
{
   private $requestRequest;
   
   public function __construct($request){
       $this->requestRequest = new RequestRequest($request);
   }
   public function admin(){
       session_start();
         $_SESSION['message']='Successfully requested writer role, wait for confirmation';
         App::get("requestQuery")->addRequest($_SESSION['email'],'writer request');
         return redirect('profile');
   }
   public function getRequests(){
      session_start();
        $requests=App::get("requestQuery")->selectAll('requests');

        return view('request_dash',compact('requests'));
  }
  public function reqLoad(){
      session_start();
      $request=App::get("requestQuery")->selectAllOneCon('requests', 'id', $this->requestRequest->reqData('reqId'))[0];
      if ($request->type=='writer request') {
          return view('wreq', compact($request));
      } elseif ($request->type=='comment request') {
          return view('creq', compact($request));
      } elseif ($request->type=='post request') {
          return view('preq', compact($request));
      }
  }
}

