<?
	define('DIR_LIB', DIR_PRIVATE . 'lib/');

	include(DIR_LIB . 'co.php');
	include(DIR_LIB . 'mysql.php');
	include(DIR_LIB . 'auth.php');
	include(DIR_LIB . 'router.php');

	CO::RE();
	
	CO::SQL(new \DB\SQLi())->connect(
		'test.sete.pw',
		'root',
		'kolkol123',
		'test_images'
	);

	CO::AUTH(new \Auth('fsdnoFi3h0W9ghGpsdi234E2'));

	CO::ROUTER(new \Router());

		CO::ROUTER()->push('/^json-image.php/', function(){
			include DIR_PRIVATE . 'json/get-list.php';
		});

		CO::ROUTER()->push('/^transition-image.php/', function(){
			include DIR_PRIVATE . 'json/get-image.php';
		});

		CO::ROUTER()->push('/^.*/', function(){
			echo '404. Not found: ' . strip_tags(CO::RE()->url);
		});

	CO::ROUTER()->start( CO::RE()->url );