<?
	if(!CO::AUTH()->user()){
		redirect('/');
	}else{
		$onPage = 30;

		$startId = isset(CO::RE()->get['start']) ? (int)CO::RE()->get['start'] : 0;

		$list = CO::SQL()->query(
			"SELECT *
			from images
			where
				user_id = ?
		");
?>




<?
	}
?>

