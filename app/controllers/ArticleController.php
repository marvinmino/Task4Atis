<?php

namespace App\Controllers;
use App\Core\App;
use ArticleRequest;
use Slug;
class ArticleController implements controllerInterface
{   use dd;
    private $articleRequest;
    
    public function __construct($request)
    {
        $this->articleRequest = new ArticleRequest($request);
    }

    public function show(){
        $articles=App::get('articleQuery')->selectSortAllOneCon('article','status','okay','token','asc');
        $articlesFeatured=App::get('articleQuery')->selectAllTwoCon('article','status','okay','is_featured',1);
        $categories=App::get('articleQuery')->selectAll('category');
        require 'app/views/articles.view.php';
    }
    public function allarticles(){
        $articles=App::get('articleQuery')->selectSortAllOneCon('article','0','0','token','asc');
        return view('allarticles',compact('articles'));
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
            
        }
        return redirect('create');
    }
    public function tag(){
        $articles=App::get('articleQuery')->manytomany('article','articleTags','tags','name',$this->articleRequest->reqData('tag'));
        return view('myarticles',compact('articles'));
    }
    public function select(){
        $articles=App::get('articleQuery')->selectAllTwoCon('article','category',$this->articleRequest->reqData('select'),'status','okay');
        $articlesFeatured=App::get('articleQuery')->selectAllTwoCon('article','status','okay','is_featured',1);
        $categories=App::get('articleQuery')->selectAll('category');
        require 'app/views/articles.view.php';
    }
    public function category(){
        $articles=App::get('articleQuery')->manytomany('article','articleTags','tags','category',$this->articleRequest->reqData('category'));
        return view('articles',compact('articles'));
    }
    public function sort()
    {
        $sorts=$this->articleRequest->reqData('sorts');
        $ids=explode(',', $sorts);
        App::get('articleQuery')->sort($ids);
        return redirect('allarticles');
    }


    

    public function delete(){

        App::get('articleQuery')->delete('article','id',$this->ArticleRequest->reqData('deleteArticle'));
        return redirect('home');
    }
    public function update(){
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
    public function post(){
        session_start();
        $article=App::get('articleQuery')->selectAllTwoCon('article','slug',$this->articleRequest->reqData('slug'),'status','okay')[0];
        $user=App::get('articleQuery')->selectAllOneCon('users','email',$_SESSION['email'])[0];
        if($user->role!='reader')
        $article=App::get('articleQuery')->selectAllOneCon('article','slug',$this->articleRequest->reqData('slug'))[0];
        $tags=App::get('articleQuery')->manytomanytwo('article','articleTags','tags','slug',$this->articleRequest->reqData('slug'),'status','okay');
        $comments=App::get('commentQuery')->selectAllTwoCon('comments','accepted',1,'article',$article->id);
        if(($article->status=="okay"||$_SESSION['user_role']=="admin"||$user->id==$article->userId)&&!empty($article))
        require 'app/views/post.view.php';
        else
        return redirect('../home');
    }
    public function featured(){
            $id=$this->articleRequest->reqData('id');
            $articles=App::get('articleQuery')->selectAllOneCon('article','id',$id)[0];
            if($articles->is_featured==0)
            App::get('articleQuery')->update('article','is_featured',1,'id',$id);
            else
            App::get('articleQuery')->update('article','is_featured',0,'id',$id);
            return redirect('../post/'.$articles->slug);
    }
}