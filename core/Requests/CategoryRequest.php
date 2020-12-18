
<?php
use App\Core\Request;
class CategoryRequest extends Request
{
    public function __construct($request)
    {
        $this->input = $request->input();
    }
    public function categoryAuth(){
        if(empty($this->reqData('categoryName'))){
            session_start();
            $_SESSION['error']='Category name not set';
        }
    }
}
