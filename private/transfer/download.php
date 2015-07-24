<?
	$url = $args['url']; // url картинки из базы
	$format = $args['format']; // preview или origin.

	/**
	 *
	 * 
	 * Если preview, то отдаешь файл с именем $url из private/image
	 * Иначе, из private/image-preview
	 *
	 * 
	 */
