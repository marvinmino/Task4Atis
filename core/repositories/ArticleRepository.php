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
        if (!empty($this->selectAllOneCon('article', 'slug', $slug))) {
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
    public function sort($args)
    {    $i=0;
        foreach ($args as $id) {
            $i++;
            $this->update('article', 'token', $i, 'id', $id);
        }
    }
    public function updateArticle($id,$name,$description,$priority,$deadline)
    {       
            $this->update('article','name',$name,'id',$id);
            $this->update('article','description',$description,'id',$id);
            $this->update('article','priority',$priority,'id',$id);
            $this->update('article','deadline',$deadline,'id',$id);
        return redirect('home');
    
    }
}