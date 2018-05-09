<?php
session_start();


/*
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
        header('Location: gallery-generator-login.php');
}
*/

$this_gallery_folder_name = trim($_POST['gallery_folder_name']);

$dirname = "galleries/".$this_gallery_folder_name."/thumb-img/";

$images = scandir($dirname);
array_splice($images, 0, 2); //leszedi az első három elemet amik nem kellenek mert nem képek "." meg ".." 

foreach ($images as $curimage) {
    $id = substr($curimage, 0, -4);
	$txt = '
	<div class="gallery">
    		<img src="'.$dirname.$curimage.'" alt="Fjords" width="100" height="100" id="'.$id.'" class="image">
	</div>
    ';   
    echo $txt;  
}

?>
