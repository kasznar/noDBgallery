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

<div  class="overlay" id="add-img-overlay">
	<div class="wrapper">
		<div class="add-image-container">
		 dikkazzz
		</div> <!-- add image container-->
	</div> <!-- add image wrapper -->
</div> <!--add image overlay -->


<div class="wrapper">
	<div class="header">
		<input type="text" id="newGalleryName">
		<button type="button" id="newGalleryButton">New Gallery!</button>
	</div>
	
	<center>ctrl click images to select</center>

	<div class="gallery-list-container">

	</div>
</div>



</body>
</html>