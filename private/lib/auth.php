<?
	class Auth{

		private $salt;
		private $user;

		function __construct($salt){
			$this->salt = $salt;

			if(
				isset(CO::RE()->cookie['authid'])
				&&
				isset(CO::RE()->cookie['authsh'])
			){
				$user = $this->getUserById( CO::RE()->cookie['authid'] );

				if($user && $user['passwd'] === CO::RE()->cookie['authsh']){
					$this->user = $user;
				}
			}
		}

		function update(){
			if(!is_null($this->user)){
				$this->user = $this->getUserById( CO::RE()->cookie['authid'] );
			}
		}

		function login($email, $passwd){
			$user = $this->getUserByEmail( $email );

			if($user && $user['passwd'] === $this->getHash( $user['id_user'], $passwd )){
				$this->user = $user;

				CO::RE()->cookie('authid', $this->user['id_user']);
				CO::RE()->cookie('authsh', $this->user['passwd']);
			}
		}

		function logout(){
			unset($this->user);

			CO::RE()->cookie('authid', '');
			CO::RE()->cookie('authsh', '');
		}

		function getUserByEmail($email){
			$result = CO::SQL()->query(
				"SELECT *
				from users
				where
					email = ?
				limit 1;
			", [
				['s', $email]
			]);

			return $result[0];
		}
		function getUserById($id){
			$result = CO::SQL()->query(
				"SELECT *
				from users
				where
					id_user = ?
				limit 1;
			", [
				['i', (int)$id]
			]);

			return $result[0];
		}

		function who($place = null){
			return is_null($place) ? $this->user : $this->user[$place];
		}

		function user(){
			return isset($this->user);
		}

		function getHash($id, $passwd){
			return md5($this->salt . ':' . $id . ':' . $passwd);
		}

	}