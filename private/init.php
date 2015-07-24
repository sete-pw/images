<?
	define('DIR_LIB', DIR_PRIVATE . 'lib/');

	include(DIR_LIB . 'co.php');
	include(DIR_LIB . 'mysql.php');

	CO::RE();
	CO::SQL(new \DB\SQLi())->connect(
		'test.sete.pw',
		'root',
		'kolkol123',
		'test_images'
	);