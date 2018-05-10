<?php
session_start();
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
        header('Location: gallery-login.php');    
}

$this_img_path = trim($_POST['img_to_delete']);

//prevent deleting anything outside the galleryes folder
$this_img_path_array =  explode("galleries", $this_img_path);
$this_img_path = "galleries".$this_img_path_array[1];

//delete thumb image
unlink($this_img_path);

//delete web size image
$path_arr = explode("thumb-img", $this_img_path);
unlink($path_arr[0]."web-size-img".$path_arr[1]);

?>