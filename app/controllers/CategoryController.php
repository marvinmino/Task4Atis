<?php

namespace App\Controllers;

use App\Core\App;
use CategoryRequest;

class CategoryController 
{
    private $categoryRequest;
   
    public function __construct($request){
        $this->categoryRequest = new CategoryRequest($request);
    }

    public function show()
    { 
        $categories=App::get('categoryQuery')->selectAll('category');
        // die(var_dump($categories));
        return view('category',compact('categories'));
    }
    public function save()
    {  
        $this->categoryRequest->categoryAuth();
        if(empty($_SESSION['error']))
        {
            App::get('categoryQuery')->insertCategory(
                $this->categoryRequest->reqData('categoryName'),
            );
        }
        else
        return redirect('category');
    }
    public function delete()
    { 
        $id=$this->categoryRequest->reqData('delete');
        App::get('categoryQuery')->delete('category','id',$id);
    }
    public function edit()
    {   
        $id=$this->categoryRequest->reqData('id');
        $name=$this->categoryRequest->reqData('name');

        if (!empty($name)) {
            App::get('categoryQuery')->update('category', 'name', $name, 'id', $id);
            return redirect('category');
        } else {
            $_SESSION['error']="Category name cannot be empty";
            return redirect('category');
        }
    }

}
