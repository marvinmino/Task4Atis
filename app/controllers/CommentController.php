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
            $comment=App::get("commentQuery")->selectAllOneCon('comments','article',$this->commentRequest->reqData('articleId'));
            $comment=$comment[sizeof($comment)-1];
            $text=$comment->id."@@User ".$_SESSION['email']." commented '".$this->commentRequest->reqData('comment')."' on <a style='color:blue;' href='post/".App::get('commentQuery')->selectAllOneCon('article','id',$this->commentRequest->reqData('articleId'))[0]->slug."'>article</a>";
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
        return redirect("../post/".App::get('commentQuery')->selectAllOneCon('article', 'id', $this->commentRequest->reqData('articleId'))[0]->slug);
       
    }   
    public function edit(){
        $id=$this->commentRequest->reqData('id');
        $text=$this->commentRequest->reqData('text');
        $slug=$this->commentRequest->reqData('slug');

        if (!empty($text)) {
            App::get('commentQuery')->update('comments', 'text', $text, 'id', $id);
            return redirect('../post/'.$slug);

        } else {
            $_SESSION['message']="Comment cannnot be empty";
            return redirect('../post/'.$slug);
        }
    }
    public function delete(){
        $id=$this->commentRequest->reqData('delete');

        App::get('commentQuery')->delete('comments','id',$id);
    }
    public function acceptComment(){

        App::get("commentQuery")->update('comments','accepted',1,'id',$this->commentRequest->reqData('id'));
        return redirect('reqDash');
    }
}
