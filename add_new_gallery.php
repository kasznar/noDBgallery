<?php
	$dateStr = date("Ymd_his");
	$new_gallery_name = trim($_POST['posted_gallery_name']);
	$path = 'galleries/'.$dateStr."_".$new_gallery_name;
	if (!file_exists($path)) {
    	mkdir($path, 0777, true);
    	mkdir($path."/thumb-img", 0777, true);
    	mkdir($path."/web-size-img", 0777, true);
	}
?>