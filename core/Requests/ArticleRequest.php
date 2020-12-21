<?php
use App\Core\Request;
use Image;
class ArticleRequest extends Request
{
    public function __construct($request)
    {
        $this->input = $request->input();
    }

    public function articleAuth()
    {   
        session_start();
        if (empty($this->reqData('title'))) {
            session_start();
            $_SESSION['error'] = "Title not set";
        }
        if (empty($this->reqData('description'))) {
            session_start();
            $_SESSION['error'] = " description not set";
        }
        if (strlen($this->reqData('description')) < 60) {
            session_start();
            $_SESSION['error'] = "Description is too short";
        }
        if (empty($this->reqData('date'))) {
            session_start();
            $_SESSION['error'] = "Date not set";
        }
        if (empty($this->reqData('content'))) {
            session_start();
            
            $_SESSION['error'] = "Content not set";
        }
        
        $target_dir = "app/content/article/images/";
        if (isset($_FILES['fileToUpload'])) {
            // die(var_dump($_FILES));
            $newname=str_replace(array("/",' ','-'),"",$_FILES["fileToUpload"]["name"]);
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $target_new_file=$target_dir . str_replace(array("/",' ','-'),"",basename($_FILES["fileToUpload"]["name"]));
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


            // Check if image file is a actual image or fake image
            if (!isset($_FILES["fileToUpload"]["name"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check == false) {
                    $_SESSION['error'] = "{$_FILES["fileToUpload"]["name"]} is not an image." ;
                }
            }
      
            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                $_SESSION['error'] ="Sorry, {$_FILES["fileToUpload"]["name"]} is not a JPG, JPEG, PNG & GIF file";
            }

            // Check if $_SESSION['error'] is set to 0 by an error
            if (empty($_SESSION['error'])) {
                 Image::compressImage($_FILES["fileToUpload"]["tmp_name"],"app/content/article/thumbnails/{$newname}",40);
                $fileType = pathinfo($target_file,PATHINFO_EXTENSION); 
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_new_file)) {
                    $_SESSION['path'] ="../".$target_new_file;
                    $_SESSION['thumbnail']="app/content/article/thumbnails/".basename($newname);
                    Image::addWatermark($target_new_file,$fileType);
                }
            }
        }
    }
}