<?php
session_start();

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
        header('Location: gallery-login.php');    
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>gallery manager</title>
	<link rel="stylesheet" href="style.css">
	<script src="jquery-3.3.1.min.js"></script>
	<script src="gallery-manager.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<meta charset="utf-8">
</head>
<body>


<div class="reminder">
	ctrl click images to select
</div>

<div class="header">
		<div id="title-text">
			<p>noDBgallery</p>
		</div>
		<div class="button red-button" onclick="new_gallery_on()">
			<p>New Gallery</p>
		</div>
</div> <!-- header -->

<div class="pop-up-menu" id="new-gallery-pop-up">
	Gallery name <br>
	<input type="text" id="newGalleryName"> <br>
	<div class="new-gallery-buttons-container">
		<button type="button" class="red-button" id="newGalleryButton">Create</button>
		<button type="button" class="blue-button" onclick="new_gallery_off()">Cancel</button>
	</div>
</div>

<div class="wrapper">	
	<div class="gallery-list-container">
		<!--galleries listed here-->
	</div>
</div>



</body>
</html>