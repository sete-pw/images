<?
	$url = $args['url']; // url картинки из базы
	$format = $args['format']; // preview или origin.
	if ($format == 'preview'){

		header('Content-Type: image/jpeg');
		echo file_get_contents(DIR_PRIVATE.'data/image-preview/'.$url.'.jpeg');

		die;
		//echo file_get_contents(DIR_PRIVATE.'image-preview/'.$url.'.gif');
	}else{
		
	}


	/**
	 *
	 *
	 * Если preview, то отдаешь файл с именем $url из private/image
	 * Иначе, из private/image-preview
	 *
	 * 
	 */
