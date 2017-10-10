<?php
	$_PATH_UPLOAD = $_SERVER["DOCUMENT_ROOT"]."/uploads/text_editor_image/";
	$_PATH_UPLOAD_FOR_VIEW = "/uploads/text_editor_image/";
	$_IMAGES = array();
	if($_FILES) {
		$fileName = "uploaded-file-".mktime()."-".rand().".".pathinfo($_FILES["image1"]["name"], PATHINFO_EXTENSION); // The file name
		$fileTmpLoc = $_FILES["image1"]["tmp_name"];
		$fileType = $_FILES["image1"]["type"];
		$fileSize = $_FILES["image1"]["size"];
		$fileErrorMsg = $_FILES["image1"]["error"];

		if (!$fileTmpLoc) {
			die("error");
		}
		if ( !file_exists($_PATH_UPLOAD) ) {
			$oldmask = umask(0);  // helpful when used in linux server
			mkdir ($_PATH_UPLOAD, 0744);
		}
		if(move_uploaded_file($fileTmpLoc, $_PATH_UPLOAD."$fileName")) {
			$_IMAGES["path"] = $_PATH_UPLOAD_FOR_VIEW.$fileName;
			$_IMAGES["name"] = $_FILES["image1"]["name"];
			//die(json_encode($_IMAGES));
			echo json_encode($_IMAGES);
		} else  {
			die("failed");
		}
	}
?>