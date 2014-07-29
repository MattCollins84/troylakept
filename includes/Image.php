<?php

class Image {

  static public function createImage($file, $max_width=1000, $max_height=1000, $path="") {

    $ext = ResultsController::getExtension($file['name']);

    list($width,$height)=getimagesize($file['tmp_name']);

    // png
    if ($ext == "png") {
      $src = imagecreatefrompng($file['tmp_name']);
    }

    else if (in_array($ext, array("jpg", "jpeg"))) {
      $src = imagecreatefromjpeg($file['tmp_name']);
    }

    else {
      $src = imagecreatefromgif($file['tmp_name']);
    }

    // is this portrait or landscape?
    $orientation = "landscape";
    if ($height > $width) {
      $orientation = "portrait";
    }

    /**********
      THUMBNAILS
    **********/

    // for portrait
    if ($orientation == "portrait") {

      // new dimensions - thumbnail
      $newheight = ($height < $max_height)?$height:$max_height;
      $newwidth=($width/$height)*$newheight;

    }

    // landscape
    else {

      // new dimensions - thumbnail
      $newwidth = ($width < $max_width)?$width:$max_width;
      $newheight=($height/$width)*$newwidth;

    }

    // check that both height and width are within the boundaries
    if ($newwidth > $max_width) {

      $pc = ($max_width/$newwidth);

      $newwidth = floor($newwidth * $pc);
      $newheight = floor($newheight * $pc);

    }

    if ($newheight > $max_height) {

      $pc = ($max_height/$newheight);

      $newwidth = floor($newwidth * $pc);
      $newheight = floor($newheight * $pc);

    }

    // create the new image - thumb
    $tmp=imagecreatetruecolor($newwidth,$newheight);

    // resize
    imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

    // create thumb!
    imagejpeg($tmp,"uploads/".$path,100);

    // clean up
    imagedestroy($src);
    imagedestroy($tmp);

    return $path;

  }

}

?>