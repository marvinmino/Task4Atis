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
        if (empty($this->reqData('content'))) {
            session_start();
            $_SESSION['error'] = "Content not set";
        }
        $target_dir = "app/content/article/images/";
        if (isset($_FILES['fileToUpload'])) {
            // die(var_dump($_FILES));
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
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
                 Image::compressImage($_FILES["fileToUpload"]["tmp_name"],"app/content/article/thumbnails/{$_FILES['fileToUpload']['name']}",40);
                $fileType = pathinfo($target_file,PATHINFO_EXTENSION); 
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $_SESSION['path'] =$target_dir.basename($_FILES["fileToUpload"]["name"]);
                    Image::addWatermark($target_file,$fileType);
                }
            }
            
            die();
        }
    }
}