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
			$controls = "<div class='gallery-controls ".$gallery_folder_name."'></div>";
			$delete_gallery = "<div class='gallery-delete ".$gallery_folder_name."'><button type='button' class='delete-button' id='delete__".$gallery_folder_name."'>delete gallery</button></div>";
			$delete_img = "<div class='img-delete ".$gallery_folder_name."'><button type='button' class='img-delete-button' id='img-delete__".$gallery_folder_name."'>delete selected images</button></div>";
			$images = "<div class='gallery-images ".$gallery_folder_name."'></div>";

		echo $wrapper.$row.$container.$tag.$controls.$delete_gallery.$delete_img.$images."</div></div>";
		
	}

?>