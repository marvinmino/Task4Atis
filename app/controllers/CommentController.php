<?php

namespace App\Controllers;

use App\Core\App;
use CommentRequest;
class CommentController 
{
    private $commentRequest;
   
    public function __construct($request){
        $this->commentRequest = new CommentRequest($request);
    }
    
    public function save()
    {
        session_start();

        if (!empty($this->commentRequest->reqData('comment'))) {
            App::get('commentQuery')->addComment(
                $_SESSION['email'],
                $this->commentRequest->reqData('articleId'),
                $this->commentRequest->reqData('comment'),
            );
            $text="User ".$_SESSION['email']."commented ".$this->commentRequest->reqData('comment')."on <a href='post/".App::get('commentQuery')->selectAllOneCon('article','id',$this->commentRequest->reqData('articleId'))[0]->slug."'>article</a>";
            App::get("requestQuery")->insert('requests', [
                'id_user'   =>     $_SESSION['uid'],
                'type'      =>     'comment request',
                'text'     =>      $text,
            ]);
            $_SESSION['message']="Wait for comment to be confirmed by admin";
        }
         else {
            $_SESSION['message']="Comment cant be empty";
        }
        return redirect("post/".App::get('commentQuery')->selectAllOneCon('article', 'id', $this->commentRequest->reqData('articleId'))[0]->slug);
       
    }   

    public function acceptComment(){
        $comment=App::get("commentQuery")->update('Comment','role','writer','id',$this->commentRequest->reqData('id'));
        return redirect('requests');
    }
}
