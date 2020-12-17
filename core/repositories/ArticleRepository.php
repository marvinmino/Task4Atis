<?php 

namespace App\Core\Repository;

use PDO;

class ArticleRepository extends RepositoryBuilder{
    protected $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function insertArticle($title,$slug,$description,$content,$userId)
    {
        // die(var_dump($_SESSION['path']));
            $this->insert('article', [
                'title'       => $title,
                'slug'        => $slug,
                'description' => $description,
                'content'     => $content,
                'userId'      => $userId,
                'category'    => 'joe',
                'thumbnail'   => "nope",
                'image'       => $_SESSION["path"],
                ]);
        return redirect('test');
        
    }
    public function sort($args)
    {    $i=0;
        foreach ($args as $id) {
            $i++;
            $this->update('Articles', 'token', $i, 'id', $id);
        }
    }
    public function updateArticle($id,$name,$description,$priority,$deadline)
    {       
            $this->update('Articles','name',$name,'id',$id);
            $this->update('Articles','description',$description,'id',$id);
            $this->update('Articles','priority',$priority,'id',$id);
            $this->update('Articles','deadline',$deadline,'id',$id);
        return redirect('home');
    
    }
}