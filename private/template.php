<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title><?=CO::PROJECT()['name']?></title>

	<!-- Bootstrap -->
	<link href="/assets/libs/bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet">

	<link href="/assets/css/main.css" rel="stylesheet">

	<? foreach(CO::RE()->css as $css){ ?>
	<link href="<?=$css?>" rel="stylesheet">
	<? } ?>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<header>
		<nav class="navbar navbar-default navbar-static-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse-1">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/"><?=CO::PROJECT()['name']?></a>
				</div>

				<div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class=""><a href="/"><span class="glyphicon glyphicon-home"></span>&nbsp;Загрузить</a></li>
						<? 
							if(CO::AUTH()->user()){
						?>
						<li class=""><a href="/file-manager.php"><span class="glyphicon glyphicon-barcode"></span>&nbsp;Файловый менеджер</a></li>
						<?
							}
						?>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<? 
							if(!CO::AUTH()->user()){
						?>
						<li><a href="#loginModal" data-toggle="modal" class="text-success"> <span class="glyphicon glyphicon-lock text-success"></span>&nbsp;Войти</a></li>
						<? 
							} 
						?>
					</ul>
				</div>
			</div>
		</nav>
		
		<? 
			if(!CO::AUTH()->user()){
		?>

		<div class="modal fade" id="loginModal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
						<h4 class="modal-title">Вход</h4>
					</div>
					<div class="modal-body">		
						<form class="form-horizontal" method="POST" action="/login.php">
							<fieldset>
								<div class="form-group">
									<label for="inputEmail" class="col-lg-2 control-label">Email</label>
									<div class="col-lg-10">
										<input class="form-control" id="inputEmail" placeholder="Email" type="text" name="email">
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
					</div>
				</div>
			</div>
		</div>

		<?
			}
		?>

	</header>
	
	<div class="container" id="content">
		<?=$content?>
	</div>

	<footer></footer>





	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- jQuery UI CSS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="/assets/libs/bootstrap-3.3.5/js/bootstrap.min.js"></script>


	
	<? foreach(CO::RE()->js as $js){ ?>
		<script src="<?=$js?>"></script>
	<? } ?>

</body>
</html>