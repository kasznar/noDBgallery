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


<div class="wrapper">
	<div class="header">
		<div id="title">
			noDBgallery
		</div>
		<div id="new-gallery-controls">
			<input type="text" id="newGalleryName">
			<button type="button" id="newGalleryButton">New Gallery!</button>
		</div>
	</div>
	
	<center>ctrl click images to select</center>

	<div class="gallery-list-container">

	</div>
</div>



</body>
</html>