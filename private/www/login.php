<?
	if(
		isset(CO::RE()->post['email'])
		&&
		isset(CO::RE()->post['passwd'])
	){
		CO::AUTH()->login( CO::RE()->post['email'], CO::RE()->post['passwd'] );

		if(CO::AUTH()->who('email') === CO::RE()->post['email']){
			CO::RE()->redirect('/');
		}
	}
?>

<form class="form-horizontal col-md-offset-3 col-md-6" method="POST" action="/login.php">
	<fieldset>
		<div class="form-group">
			<label for="inputEmail" class="col-lg-2 control-label">Email</label>
			<div class="col-lg-10">
				<input class="form-control" id="inputEmail" placeholder="Email" type="text" name="email" value="<?=CO::RE()->post['email']?>">
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword" class="col-lg-2 control-label">Пароль</label>
			<div class="col-lg-10">
				<input class="form-control" id="inputPassword" placeholder="Пароль" type="password" name="passwd">
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-10 col-lg-offset-2">
				<button type="submit" class="btn btn-primary">Войти</button>
			</div>
		</div>
	</fieldset>
</form>