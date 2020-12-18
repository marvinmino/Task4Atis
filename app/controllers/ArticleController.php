<?php

namespace App\Controllers;

use App\Core\App;
use ArticleRequest;
use Slug;
class ArticleController 
{
    private $articleRequest;
    
    public function __construct($request)
    {
        $this->articleRequest = new ArticleRequest($request);
    }

    public function home(){
        $articles=App::get('articleQuery')->selectAll('article');
       
        return view('articles',compact('articles'));
    }

    
    public function save()
    {
        session_start();
        $user=$_SESSION['uid'];
        
        $this->articleRequest->ArticleAuth();
        //  die(var_dump($this->articleRequest->reqData('title')));
        if (empty($_SESSION['error'])) {
            $slug=Slug::slugify($this->articleRequest->reqData('title'));
            // die(var_dump($slug));
            App::get('articleQuery')->insertArticle(
                $this->articleRequest->reqData('title'),
                $slug,
                $this->articleRequest->reqData('description'),
                $this->articleRequest->reqData('content'),
                $user,
                $this->articleRequest->reqData('date'),
                $this->articleRequest->reqData('category'),
            );
            return redirect('post/'.$slug);
        }
        else
        return redirect('create');
    }
    public function sort()
    {
        $sorts=$this->ArticleRequest->reqData('sorts');
        $ids=explode(',', $sorts);
        App::get('ArticleQuery')->sort($ids);
    }


    public function check()
    {
        // die(var_dump($this->ArticleRequest->reqData('check')));
        App::get('ArticleQuery')->update('Articles', 'done', $this->ArticleRequest->reqData('check'), 'id', $this->ArticleRequest->reqData('idcheck'));
    }
    public function edit(){
        session_start();
        if(isset($_SESSION['email']))
        {   
            $Article = App::get('ArticleQuery')->selectAllOneCon('Articles','id',$this->ArticleRequest->reqData('id'));
            return view('edit',compact('Article'));
        }
        else 
        return redirect('login');
    
        return view('edit',compact($this->ArticleRequest->reqData('id')));
    }
    public function editData(){
        session_start();
        
        $this->ArticleRequest->ArticleAuth();
        if (empty($_SESSION['error'])) {
            
            App::get('ArticleQuery')->updateArticle(
                $this->ArticleRequest->reqData('id'),
                $this->ArticleRequest->reqData('articleName'),
                $this->ArticleRequest->reqData('articleDescription'),
                $this->ArticleRequest->reqData('articlePriority'),
                $this->ArticleRequest->reqData('articleDeadline')
            );
        }
        else
        return redirect('edit?id='.$this->ArticleRequest->reqData('id'));
    }
    public function delete(){

        App::get('ArticleQuery')->delete('article','id',$this->ArticleRequest->reqData('deleteArticle'));
        return redirect('home');
    }
}