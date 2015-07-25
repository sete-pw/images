<?
	if(CO::AUTH()->user()){

		if(
			isset(CO::RE()->post['passwd'])
			&&
			isset(CO::RE()->post['passwd_new'])
			&&
			CO::RE()->post['passwd'] != CO::RE()->post['passwd_new']
			&&
			CO::AUTH()->who('passwd') === CO::AUTH()->getHash(CO::AUTH()->who('id_user'), CO::RE()->post['passwd'])
		){
			CO::SQL()->query(
				"UPDATE users
				set
					passwd = ?
				where
					id_user = ?
				limit 1;
			", [
				['s', CO::AUTH()->getHash(CO::AUTH()->who('id_user'), CO::RE()->post['passwd_new'])],
				['i', CO::AUTH()->who('id_user')]
			]);

			CO::AUTH()->login(CO::AUTH()->who('email'), CO::RE()->post['passwd_new']);
		}

		if(
			isset(CO::RE()->post['name'])
		){
			CO::SQL()->query(
				"UPDATE users
				set
					name = ?
				where
					id_user = ?
				limit 1;
			", [
				['s', strip_tags(CO::RE()->post['name'])],
				['i', CO::AUTH()->who('id_user')]
			]);

			CO::AUTH()->update();
		}

?>

<h1>
	<?=CO::AUTH()->who('name')?>
</h1>

<div class="col-lg-8">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#profile" data-toggle="tab" aria-expanded="true">Профиль</a></li>
		<li class=""><a href="#security" data-toggle="tab" aria-expanded="false">Безопасность</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane fade active in" id="profile">
			

			<form class="form-horizontal col-lg-8" action="" method="post">
				<input type="hidden" name="act" value="edit">
				<fieldset>
					<div class="form-group">
						<label for="inputName" class="col-lg-4 control-label">Имя</label>
						<div class="col-lg-8">
							<input type="text" name="name" class="form-control" id="inputName" placeholder="Имя" value="<?=CO::AUTH()->who('name')?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail" class="col-lg-4 control-label">Email</label>
						<div class="col-lg-8">
							<input type="text" name="email" class="form-control" id="inputEmail" placeholder="Email" value="<?=CO::AUTH()->who('email')?>" disabled="">
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-8 col-lg-offset-4">
							<button type="submit" class="btn btn-primary">Сохранить</button>
						</div>
					</div>
				</fieldset>
			</form>


		</div>
		<div class="tab-pane fade" id="security">
			

			<form class="form-horizontal col-lg-8" action="" method="post">
				<input type="hidden" name="act" value="edit">
				<fieldset>
					<div class="form-group">
						<label for="inputPass" class="col-lg-4 control-label">Пароль</label>
						<div class="col-lg-8">
							<input type="password" name="passwd" class="form-control" id="inputPass" placeholder="Пароль">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassNew" class="col-lg-4 control-label">Новый пароль</label>
						<div class="col-lg-8">
							<input type="password" name="passwd_new" class="form-control" id="inputPassNew" placeholder="Новый пароль">
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-8 col-lg-offset-4">
							<button type="submit" class="btn btn-primary">Сохранить</button>
						</div>
					</div>
				</fieldset>
			</form>


		</div>

	</div>
</div>


<?
	}else{
		CO::RE()->redirect('/login.php');
	}
?>