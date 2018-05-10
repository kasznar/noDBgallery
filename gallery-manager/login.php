<!DOCTYPE html>
<html>

<head>
	<title>best login</title>
	<meta charset="utf-8">
</head>

<body>


<center>
<form action="" method="POST" enctype="multipart/form-data">
	<p>
		Password:
		<input type="password" name="passwd">
	</p>
	<p>
		<input type="submit" class="button" value="Login">
	</p>
</form>



<?php
session_start();
//include("connect.php");

//megnézi beadtak e login adatokat és hogy a beadott jelszó nem nulla e
if (isset($_POST['passwd']) && $_POST['passwd'] != ''){
	$input_passwd = $_POST['passwd'];

	$tarolt_jelszo = sha1("1234");

	if (sha1($input_passwd) == $tarolt_jelszo) {
		$_SESSION['loggedIn'] = true;
		header('Location: gallery-manager.php');
	} else {
		$_SESSION['loggedIn'] = false;
		echo('wrong password');
	}
}

?>


</center>
</html>
