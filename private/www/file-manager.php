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
				id_image > ?
			limit ?;
		", [
			['i', $startId],
			['i', $onPage]
		]);
?>


<div class="row">
	<?
		foreach($list as $img){
			$img['url'] = '/image/' . $img['url'];
			$img['url_preview'] = $img['url'] . '/preview';
	?>
	<a href="<?=$img['url']?>" class="col-lg-3">
		<img src="<?=$img['url_preview']?>" alt="<?=$img['category']?>" style="width:100%;">
		<strong><?=$img['category']?></strong>
	</a>
	<?
		}
	?>
</div>


<?
	}