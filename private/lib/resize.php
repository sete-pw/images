<?
	function createPreview($url){
		$ext  = strtolower(explode('.', $url)[1]);
		$filename = DIR_PRIVATE . 'data/image/' . $url;

		$extentions = array('jpg', 'jpeg', 'gif', 'png', 'bmp');

		if (in_array($ext, $extentions)) {

		list($width, $height) = getimagesize($filename); // Возвращает ширину и высоту
		$newheight = 300;
		$newwidth = 300;

		$thumb = imagecreatetruecolor($newheight, $newwidth);

		switch ($ext) {
			case 'jpg': case 'jpeg':
			$source = @imagecreatefromjpeg($filename);
			break;

			case 'gif':
			$source = @imagecreatefromgif($filename);
			break;

			case 'png':
			$source = @imagecreatefrompng($filename);
			break;

			case 'bmp':
			$source = @imagecreatefromwbmp($filename);
		}

		if($width > $height){
			$width = $height;
		}else{
			$height = $width;
		}


		imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

		imagejpeg($thumb, DIR_PRIVATE . 'data/image-preview/' . $url, 100);
	} else {
		return false;
	}

		@imagedestroy($thumb);         
		@imagedestroy($source);  

		return true;
	}