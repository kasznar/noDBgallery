<?php
session_start();
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
        header('Location: gallery-login.php');    
}



$this_gallery_folder_name = trim($_POST['gallery_folder_name']);

$dirname = "galleries/".$this_gallery_folder_name."/thumb-img/";

$abs_link = str_replace("\\",'/',"http://".$_SERVER['HTTP_HOST'].substr(getcwd(),strlen($_SERVER['DOCUMENT_ROOT'])));

$images = scandir($dirname);
array_splice($images, 0, 2); //leszedi az első három elemet amik nem kellenek mert nem képek "." meg ".." 

foreach ($images as $curimage) {
    $id = substr($curimage, 0, -4);
	$txt = '<img src="'.$abs_link."/".$dirname.$curimage.'" alt="Fjords" width="100" height="100" id="'.$id.'" class="image">';   
    echo $txt;  
}

?>
