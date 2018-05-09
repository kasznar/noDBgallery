<?php
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
		echo "<div class='galleries ".$rowClass."' id='".$gallery_folder_name."'>".$gallery_name."</div>";
		$oddRow = !$oddRow;

		$container = "<div class='gallery-container ".$gallery_folder_name."'>";
		$controls = "<div class='gallery-controls ".$gallery_folder_name."'></div>";
		$delete = "<div class='gallery-delete".$gallery_folder_name."'><button type='button' id='delete__".$gallery_folder_name."'>delete gallery</button></div>";
		$images = "<div class='gallery-images ".$gallery_folder_name."'></div>";

		echo $container.$controls.$delete.$images."</div>";
		
	}

?>