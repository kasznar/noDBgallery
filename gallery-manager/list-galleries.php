<?php

session_start();
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
        header('Location: gallery-login.php');    
}

	$oddRow = true;
	$dir    = 'galleries';
	$files = scandir($dir,1);

	array_splice($files, -3, 3);

	foreach ($files as $gallery_folder_name) {
		if($oddRow){
			$rowClass="oddRow";
		}
		else{
			$rowClass="evenRow";
		}

		$gallery_name = substr($gallery_folder_name, 16);
		
		$oddRow = !$oddRow;

		$wrapper = "<div class='gallery-wrapper ".$gallery_folder_name."'>";
			$row = "<div class='galleries ".$rowClass."' id='".$gallery_folder_name."'>".$gallery_name."</div>";
			$container = "<div class='gallery-container ".$gallery_folder_name."'>";
			$tag = '
			<div class="tag"> insert to website: <br> 
			&lt;div class="nodbgallery" id="'.$gallery_folder_name.'" &gt;&lt;/div&gt;
			</div>';
			$controls = "<div class='gallery-controls ".$gallery_folder_name."'>
			<label for='file__".$gallery_folder_name."' class='button blue-button choose-file' >Choose file</label>
			<label for='button__".$gallery_folder_name."' class='button red-button upload-button' >Upload</label>
			<div class='delete-button red-button button' id='delete__".$gallery_folder_name."'>delete gallery </div>
			<div class='img-delete-button red-button button' id='img-delete__".$gallery_folder_name."'>delete selected images </div>
			";
			$images = "<div class='gallery-images ".$gallery_folder_name."'></div>";
			$form = "<form action='upload.php'  class='upload-form' id='form__".$gallery_folder_name."' method='post' enctype='multipart/form-data'><input type='file' value='Select Images' name='fileToUpload' id='file__".$gallery_folder_name."'>
				<input type='submit' id='button__".$gallery_folder_name."' value='Upload Image' name='submit'>
				<input type='hidden' name='galleryID' value='".$gallery_folder_name."'>
			</form>";

		echo $wrapper.$row.$container.$tag.$controls."</div>".$images."</div></div>".$form;
		
	}

?>