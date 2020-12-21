<?php

class Image{
    public static function addWatermark($targetFilePath,$fileType){
        $watermarkImg = imagecreatefrompng('app/content/watermark.png');
        switch ($fileType) {
            case 'jpg':
                $im = imagecreatefromjpeg($targetFilePath);
                break;
            case 'jpeg':
                $im = imagecreatefromjpeg($targetFilePath);
                break;
            case 'png':
                $im = imagecreatefrompng($targetFilePath);
                break;
            default:
                $im = imagecreatefromjpeg($targetFilePath);
        }
         
        // Set the margins for the watermark
        $marge_right = 1;
        $marge_bottom = 1;
         
        // Get the height/width of the watermark image
        $sx = imagesx($watermarkImg);
        $sy = imagesy($watermarkImg);
         
        // Copy the watermark image onto our photo using the margin offsets and
        // the photo width to calculate the positioning of the watermark.
        imagecopy($im, $watermarkImg, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($watermarkImg), imagesy($watermarkImg));
         
        // Save image and free memory
        imagepng($im, $targetFilePath);
        imagedestroy($im);

        if (file_exists($targetFilePath)) {
            $statusMsg = "The image with watermark has been uploaded successfully.";
        }
    }

public static function compressImage($source, $destination, $quality) {

    $info = getimagesize($source);
    // die(var_dump($info['mime']));
    if ($info['mime'] == 'image/jpeg') 
      $image = imagecreatefromjpeg($source);
  
    elseif ($info['mime'] == 'image/gif') 
      $image = imagecreatefromgif($source);
  
    elseif ($info['mime'] == 'image/png') 
      $image = imagecreatefrompng($source);
  
    imagejpeg($image, $destination, $quality);
  
  }
}