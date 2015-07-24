<?
	$url = $args['url']; // url картинки из базы
	$format = $args['format']; // preview или origin.
	if ($format == 'preview'){

		header('Content-Type: image/jpeg');
		readfile(DIR_PRIVATE.'image-preview/'.$url.'.jpeg');
		//echo file_get_contents(DIR_PRIVATE.'image-preview/'.$url.'.gif');
	}


	/**
	 *
	 *
	 * Если preview, то отдаешь файл с именем $url из private/image
	 * Иначе, из private/image-preview
	 *
	 * 
	 */
