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
        $articles=App::get('articleQuery')->selectAllOneCon('article','status','okay');
       
        return view('articles',compact('articles'));
    }

    
    public function save()
    {
        session_start();
        $user=$_SESSION['uid'];
        $this->articleRequest->ArticleAuth();
        if (empty($_SESSION['error'])) {
            $slug=Slug::slugify($this->articleRequest->reqData('title'));
            $_SESSION['slug']=$slug;
            if(App::get('articleQuery')->insertArticle(
                $this->articleRequest->reqData('title'),
                $slug,
                $this->articleRequest->reqData('description'),
                $this->articleRequest->reqData('content'),
                $user,
                $this->articleRequest->reqData('date'),
                $this->articleRequest->reqData('category'),
            ))
            {   
                $tagsInput=explode("/",$this->articleRequest->reqData('tags'));
                App::get('articleQuery')->insertTags($tagsInput,$slug);
                return redirect('postrequest');
            }
            return redirect('myarticles');
        }
        else
        return redirect('create');
    }
    public function tag(){
        $articles=App::get('articleQuery')->manytomany('article','articleTags','tags','name',$this->articleRequest->reqData('tag'));
        return view('myarticles',compact('articles'));
    }
    public function category(){
        $articles=App::get('articleQuery')->manytomany('article','articleTags','tags','category',$this->articleRequest->reqData('category'));
        return view('myarticles',compact('articles'));
    }
    public function sort()
    {
        $sorts=$this->ArticleRequest->reqData('sorts');
        $ids=explode(',', $sorts);
        App::get('ArticleQuery')->sort($ids);
    }


    public function check()
    {
        App::get('ArticleQuery')->update('Articles', 'done', $this->ArticleRequest->reqData('check'), 'id', $this->ArticleRequest->reqData('idcheck'));
    }

    public function delete(){

        App::get('ArticleQuery')->delete('article','id',$this->ArticleRequest->reqData('deleteArticle'));
        return redirect('home');
    }
    public function myArticles(){
        session_start();
        $articles=App::get("articleQuery")->merge('users','article','id','userId','email',$_SESSION['email']);
        return view('myarticles',compact('articles'));
    }
    public function acceptArticle(){

        $article=App::get("userQuery")->update('article','status','okay','slug',$this->articleRequest->reqData('slug'));
        return redirect('reqDash');
    }
}