<?php

namespace App\Core\Repository;

use PDO;

class RequestRepository extends RepositoryBuilder
{
    protected $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function addRequest($email, $type)
     {   
        $user=$this->selectAllOneCon('users','email',$email)[0];
        
        // die(var_dump([$user]));
        if($type=='writer request'&&!empty($this->selectAllTwoCon('requests','id_user',$user->id,'type','writer request')))
        $_SESSION['message']='You already made a request of this kind';
        else
        $this->insert('requests', [
            'id_user'   =>     $user->id,
            'type'      =>     $type,
            'text'     =>     "User {$email} has requested for a {$type}",
        ]);
    }
   
}
