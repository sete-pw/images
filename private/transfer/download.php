<?
	$url = $args['url']; // url картинки из базы
	$format = $args['format']; // preview или origin.
	$file = explode('.',$url);
	$dir = DIR_PRIVATE."data/";
	switch ($format){
		case 'preview':
			$dir .= 'image-preview/';
			break;
		case 'origin':
			$dir .= 'image/';
			break;
		default:
			$dir ='';
			break;
	}
	if (file_exists($dir.$url)){
		header('Content-Type: image/'.$file[1]);
		echo file_get_contents($dir.$url);
		die;
	}

	/**
	 *
	 *
	 * Если preview, то отдаешь файл с именем $url из private/image
	 * Иначе, из private/image-preview
	 *
	 * 
	 */
