<?
	$img = CO::SQL()->query(
		"SELECT *
		from images
		where
			url = ?
		limit 1;
	", [
		['s', $args['url']]
	]);

	if(count($img)){
		$img = $img[0];
?>

<img src="/image/<?=$img['url']?>/origin" alt="<?=$img['category']?>" class="col-xs-12" style="margin-bottom: 20px;">
<br>

<h1 class="col-xs-12">
	Категория: <strong><?=$img['category']?></strong> / Просмотры: <?=$img['transition']?>
</h1>

<div class="col-xs-12" style="margin-bottom: 50px;">
	<a href="<?=$img['url_ext']?>" target="_blank"><?=$img['url_ext']?></a>
</div>


<?
	}else{
?>

<h1>
	Изображение не найдено!
</h1>

<?
	}
?>