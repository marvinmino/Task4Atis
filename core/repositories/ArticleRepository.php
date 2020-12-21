<?php 

namespace App\Core\Repository;

use PDO;

class ArticleRepository extends RepositoryBuilder{
    protected $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function insertArticle($title,$slug,$description,$content,$userId,$date,$category)
    {    
        if (!empty($this->selectAllOneCon('article', 'slug', $slug))&&$this->selectAllOneCon('article','slug',$slug)[0]->status!="okay") {
            $_SESSION['error']="Article with the same title already exists";
            return false;
        }
        else
            $this->insert('article', [
                'title'       => $title,
                'slug'        => $slug,
                'description' => $description,
                'content'     => $content,
                'userId'      => $userId,
                'date'        => $date,
                'category'    => $category,
                'thumbnail'   => $_SESSION['thumbnail'],
                'image'       => $_SESSION["path"],
                ]);
        return true;
        
    }
    public function insertTags($tagsInput,$slug){
                $tags=$this->selectAll('tags');
                $article=$this->selectAllOneCon('article','slug',$slug)[0];
                $counter=0;
                if(!empty($tagsInput)&&sizeof($tagsInput<=6)){
                    foreach($tagsInput as $tagin){
                        foreach($tags as $tag){
                            if($tagin==$tag->name&&!empty($tagin))
                            {
                                $counter++;
                                $tagid=$tag->id;
                            }
                        }
                        if($counter==0){
                            $tagin=str_replace(array(':', '-', '/', '*'), '', $tagin);
                            $this->insert('tags',['name'=>$tagin]);
                            $tagid=$this->selectAllOneCon('tags','name',$tagin)[0];
                            $tagid=$tagid->id;
                            $this->insert('articleTags',['articleId'=>$article->id,'tagsId'=>$tagid]);
                        }
                        else
                        $this->insert('articleTags',['articleId'=>$article->id,'tagsId'=>$tagid]);
                        $counter=0;
                      }
                }
                else
                $_SESSION['error']="You cant have more than 6 tags";
    }
    public function sort($args)
    {    $i=0;
        foreach ($args as $id) {
            $i++;
            $this->update('article', 'token', $i, 'id', $id);
        }
    }
}