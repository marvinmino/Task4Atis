<?php

namespace App\Core\Repository;

use PDO;

class CategoryRepository extends RepositoryBuilder
{
    protected $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function insertCategory($name)
    {    
        if (empty($this->selectAllOneCon('category', 'name', $name))) {
            $this->insert('category', [
                'name'     =>     $name,
            ]);
            return redirect('category');
        } else {
            session_start();
            $_SESSION['error'] = "Category with the same name already exists";
            return redirect('category');
        }
    }

}
