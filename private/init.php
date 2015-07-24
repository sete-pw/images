<?
	define('DIR_LIB', DIR_PRIVATE . 'lib/');

	include(DIR_LIB . 'co.php');
	include(DIR_LIB . 'mysql.php');
	include(DIR_LIB . 'auth.php');
	include(DIR_LIB . 'router.php');

	CO::RE();

	CO::PROJECT([
		name => 'WorkImage'
	]);

	CO::RE()->header('content-type', 'text/html; charset=utf-8');

	CO::RE()->www = function ($file){
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

		// API

		CO::ROUTER()->push('/^json-image\.php$/', function(){
			include DIR_PRIVATE . 'json/get-list.php';
			CO::RE()->end();
		});

		CO::ROUTER()->push('/^transition-image\.php$/', function(){
			include DIR_PRIVATE . 'json/get-image.php';
			CO::RE()->end();
		});

		// Web
		
		CO::ROUTER()->push('/^(index\.php)?$/', function(){
			CO::RE()->www('index.php');
		});

		CO::ROUTER()->push('/^file-manager\.php$/', function(){
			CO::RE()->www('file-manager.php');
		});

		CO::ROUTER()->push('/^image\/(?P<url>.{32}\.[a-zA-Z0-9]*)\/(?P<format>.*)$/', function($args){
			include DIR_PRIVATE . 'transfer/download.php';
			CO::RE()->end();
		});

		CO::ROUTER()->push('/^upload.php$/', function($args){
			include DIR_PRIVATE . 'transfer/upload.php';
			CO::RE()->end();
		});

		CO::ROUTER()->push('/^login\.php$/', function(){
			CO::RE()->www('login.php');
		});
		CO::ROUTER()->push('/^logout\.php$/', function(){
			CO::AUTH()->logout();
			CO::RE()->redirect('/');
		});

		// 404

		CO::ROUTER()->push('/^.*/', function(){
			echo '404. Not found: ' . strip_tags(CO::RE()->url) . PHP_EOL;
			echo 'Kernel by: sete.pw';
			CO::RE()->end();
		});

	CO::ROUTER()->start( CO::RE()->url );