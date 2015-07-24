<?
	if(!CO::AUTH()->user()){
		redirect('/');
	}else{

		CO::RE()->push('js', '/assets/js/upload.js');
?>



<?
	}
