<?
	$url = $args['url']; // url картинки из базы
	$format = $args['format']; // preview или origin.
	$file = explode('.',$url);
	if ($format == 'preview'){
		if (file_exists(DIR_PRIVATE.'data/image-preview/'.$url)){
			header('Content-Type: image/'.$file[1]);
			echo file_get_contents(DIR_PRIVATE.'data/image-preview/'.$url);
			die;
		}

	}
	if($format == 'origin'){
		if (file_exists(DIR_PRIVATE.'data/image/'.$url)) {
			header('Content-Type: image/' . $file[1]);
			echo file_get_contents(DIR_PRIVATE . 'data/image/' . $url);
			die;
		}
	}


	/**
	 *
	 *
	 * Если preview, то отдаешь файл с именем $url из private/image
	 * Иначе, из private/image-preview
	 *
	 * 
	 */
