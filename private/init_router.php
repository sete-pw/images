<?
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

	CO::ROUTER()->push('/^view\/(?P<url>.{32}\.[a-zA-Z0-9]*)$/', function($args){
		CO::RE()->www('view.php', $args);
		CO::RE()->end();
	});

	CO::ROUTER()->push('/^upload.php$/', function($args){
		include DIR_PRIVATE . 'transfer/upload.php';
		CO::RE()->end();
	});

	CO::ROUTER()->push('/^(user\.php)?$/', function(){
		CO::RE()->www('user.php');
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