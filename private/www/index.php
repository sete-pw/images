<?
	if(!CO::AUTH()->user()){
		CO::RE()->redirect('/login.php');
	}else{

		CO::RE()->push('js', '/assets/js/upload.js');
		CO::RE()->push('css', '/assets/css/upload.css');
?>

<h1>
	Загрузка изображений
</h1>

<form class="form-horizontal" method="POST" action="/upload.php" enctype="multipart/form-data">
	<fieldset>
		<input type="file" name="image[]" id="file-dialog" multiple="true" />

		<div id="img-list" class="row"></div>

		<input id="download" type="submit" class="btn btn-primary" value="Загрузить">
	</fieldset>
</form>

<?
	}
