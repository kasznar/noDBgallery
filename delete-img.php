<?php
session_start();
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
        header('Location: gallery-login.php');    
}

$this_img_path = trim($_POST['img_to_delete']);
unlink($this_img_path);

$path_arr = explode("thumb-img", $this_img_path);
unlink($path_arr[0]."web-size-img".$path_arr[1]);



?>