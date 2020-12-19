<?php

namespace App\Core\Repository;

use PDO;

class CommentRepository extends RepositoryBuilder
{
    protected $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function addComment($email, $article,$text)
{   
    // die(var_dump([$email, $article,$text]));
    $this->insert('comments', [
            'user'      =>     $email,
            'article'     =>      $article,
            'text'          =>      $text
        ]);
}
}
