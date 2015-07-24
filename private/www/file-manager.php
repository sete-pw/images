<?
	if(!CO::AUTH()->user()){
		redirect('/');
	}else{
		if(isset(CO::RE()->post['delete'])){
			$id = (int)CO::RE()->post['delete'];

			$file = CO::SQL()->query(
				"SELECT *
				from images
				where
					id_image = ?
				limit 1;
			", [
				['i', $id]
			]);

			if(count($file)){
				$file = $file[0]['url'];

				CO::SQL()->query(
					"DELETE from images
					where
						id_image = ?
					limit 1;
				", [
					['i', $id]
				]);

				unlink(DIR_PRIVATE . 'data/image/' . $file);
				unlink(DIR_PRIVATE . 'data/image-preview/' . $file);
			}
		}

		$onPage = 30;

		$startId = isset(CO::RE()->get['start']) ? (int)CO::RE()->get['start'] : 0;

		$list = CO::SQL()->query(
			"SELECT *
			from images
			where
				id_image > ?
			order by id_image desc
			limit ?;
		", [
			['i', $startId],
			['i', $onPage]
		]);


		CO::RE()->push('css', '/assets/css/file-manager.css');
		CO::RE()->push('js', '/assets/js/file-manager.css');
?>

<h1>
	Файловый менеджер
</h1>

<div class="row image-list">
	<?
		foreach($list as $img){
			$img['url'] = '/image/' . $img['url'];
			$img['url_preview'] = $img['url'] . '/preview';
	?>

	<a href="<?=$img['url']?>" class="col-lg-3 col-md-4 col-sm-6 col-xs-12 item">
		<div class="img-container">
			<img src="<?=$img['url_preview']?>" class="img" alt="<?=$img['category']?>">
			<form action="" method="post">
				<input type="hidden" name="delete" value="<?=$img['id_image']?>">
				<button class="delete btn btn-danger" title="Удалить это изображение">Удалить</button>
			</form>
		</div>
		<h4 class="title" title="<?=$img['category']?>">
			<?=$img['category']?>
		</h4>
	</a>

	<?
		}
	?>
</div>


<?
	}
