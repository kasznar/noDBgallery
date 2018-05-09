<?php

function webresize($image_to_resize,$name,$w,$dir) {
//Get Image Resource Id for Source Image 
    $source_properties = getimagesize($image_to_resize);   
    $image_resource_id = imagecreatefromjpeg($image_to_resize);  
//calculate new image size
    list($width, $height) = getimagesize($image_to_resize);
    $r = $width / $height;
    $target_width =$w;
    $target_height =$w/$r;
//Get Resource Id for Target Image Layer
    $target_layer=imagecreatetruecolor($target_width,$target_height);
//Resizing and Reassembling
    imagecopyresampled($target_layer,$image_resource_id,0,0,0,0,$target_width,$target_height, $source_properties[0],$source_properties[1]);
//Save Resized Image into Target Location
    imagejpeg($target_layer,$dir."web-size-img/".$name); 
    imagedestroy($target_layer);
    imagedestroy($image_resource_id);
}

function thumbresize($image_to_resize,$name,$thumb,$dir){

//Get Image Resource Id for Source Image
    $source_properties = getimagesize($image_to_resize);   
    $image_resource_id = imagecreatefromjpeg($image_to_resize);  

    list($width, $height) = getimagesize($image_to_resize);
    $r = $width / $height;
    $target_width =$thumb;
    $target_height =$thumb;
//calulate coordinates so the image will be cropped from the center
    $src_x = ($width - $height)/2; 
    $src_y = ($height - $width)/2;
//Get Resource Id for Target Image Layer
    $target_layer=imagecreatetruecolor($target_width,$target_height);
//Resizing and Reassembling according to landscape or portait orientation
    if ($r>=1) {
    imagecopyresampled($target_layer,$image_resource_id,0,0,$src_x,0,$target_width,$target_height, $source_properties[1],$source_properties[1]);
    }
    else{
    imagecopyresampled($target_layer,$image_resource_id,0,0,0,$src_y,$target_width,$target_height, $source_properties[0],$source_properties[0]);
    }
    
//Save Resized Image into Target Location
    imagejpeg($target_layer,$dir."thumb-img/".$name); 
    imagedestroy($target_layer);
    imagedestroy($image_resource_id);
}



$_FILES["fileToUpload"]["name"] or die("valami megmurdelt tessám!!");

$gallery_folder = $_POST["galleryID"];

$target_dir = "galleries/".$gallery_folder."/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
       // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 12000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {

webresize($_FILES["fileToUpload"]["tmp_name"],$_FILES["fileToUpload"]["name"],1500,$target_dir);
thumbresize($_FILES["fileToUpload"]["tmp_name"],$_FILES["fileToUpload"]["name"],300,$target_dir);

echo "átméretezett és levágott képek elkészültek! <br>"; 

$time = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
echo round($time,2)." másodperc alatt, ami nem is olyan rossz";

}
?>