<?
	define('DIR_LIB', DIR_PRIVATE . 'lib/');

	include(DIR_LIB . 'co.php');
	include(DIR_LIB . 'mysql.php');
	include(DIR_LIB . 'auth.php');
	include(DIR_LIB . 'router.php');
	include(DIR_LIB . 'resize.php');

	CO::RE();

	CO::PROJECT([
		name => 'WorkImage'
	]);

	CO::RE()->header('content-type', 'text/html; charset=utf-8');

	CO::RE()->www = function ($file, $args = null){
		CO::RE()->ARR('js');
		CO::RE()->ARR('css');

		include DIR_PRIVATE . 'www/' . $file;
		$content = ob_get_clean();

		ob_start();
		include DIR_PRIVATE . 'template.php';

		CO::RE()->end();
	};
	
	CO::SQL(new \DB\SQLi())->connect(
		'test.sete.pw',
		'root',
		'kolkol123',
		'test_images'
	)->query(
		"SET names utf8;
	");

	CO::AUTH(new \Auth('fsdnoFi3h0W9ghGpsdi234E2'));

	CO::ROUTER(new \Router());

	include DIR_PRIVATE . 'init_router.php';

	CO::ROUTER()->start( CO::RE()->url );