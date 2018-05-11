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

<div class="header">
		<div id="title-text">
			<p>noDBgallery</p>
		</div>
		<div class="button" onclick="new_gallery_on()">
			<p>New Gallery</p>
		</div>
</div> <!-- header -->

<div class="pop-up-menu" id="new-gallery-pop-up">	
	Gallery name <br>
	<input type="text" id="newGalleryName"> <br>
	<!--
	<div id="new gallery controls">
		<div id="spacer">dikk</div>
		<div class="button" onclick="" id="newGalleryButton">
			<p>Create</p>
		</div>
		<div class="button" onclick="" id="newGalleryButton">
			<p>Cancel</p>
		</div>
	</div>
	-->
	<button type="button" id="newGalleryButton">Create</button>
	<button type="button" onclick="new_gallery_off()">Cancel</button>
</div>

<div class="wrapper">	
	<center>ctrl click images to select</center>
	<div class="gallery-list-container">
		<!--galleries listed here-->
	</div>
</div>



</body>
</html>