<?
	include(DIR_LIB . 'CO/singltone.php');
	include(DIR_LIB . 'CO/model.php');
	include(DIR_LIB . 'CO/methods.php');

	final class CO{
		use coSingltone;
		use coModel;
		use coMethods;

		final function __construct(){
			$this->pid = 0;
			$this->process = [];

			$this->ARR('onEnd', []);
			$this->ARR('onRedirect', []);

			$this->FIX('server', $_SERVER);
			$this->FIX('post', $_POST);
			$this->FIX('get', $_GET);
			$this->FIX('request', $_REQUEST);
			$this->FIX('files', $_FILES);

			$this->FIX('cookie', $_COOKIE);
			$this->FIX('newCookie', []);
			$this->FIX('header', []);

			$this->FIX('url', trim(explode('?', $this->server['REQUEST_URI'])[0] , '/'));

			ob_start();
		}
	}