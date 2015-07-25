<?
	if(isset(CO::RE()->files['image'])){
		$imgs = CO::RE()->files['image'];

		foreach ($imgs['type'] as $key => $type) {
			if(explode('/', $type)[0] == 'image'){
				do{
					$url = md5(
						date('Y-m-d H:i:s') . '->' . rand(-99999, 99999) . ':' . rand(-99999, 99999) . ':' . rand(-99999, 99999) . ':' . rand(-99999, 99999)
					);

					$ext = explode('.', $imgs['name'][$key]);
					$ext = array_pop($ext);
					$url .= '.' . $ext;

					CO::SQL()->query(
						"INSERT INTO images
						(
							url,
							category,
							user_id
						)values(
							?,
							?,
							?
						);
					", [
						['s', $url],
						['s', mb_strtolower(trim(strip_tags(CO::RE()->post['file'][$key])), 'utf-8')],
						['i', CO::AUTH()->who('id_user')]
					]);

					$id = CO::SQL()->iid();

					if(!copy($imgs['tmp_name'][$key], DIR_PRIVATE . 'data/image/' . $url)){
						CO::SQL()->query(
							"DELETE from images
							where
								id_image = ?
							limit 1;
						", [
							['i', $id]
						]);

						break;
					}

					createPreview($url);

				} while($id == 0);
			}
		}
	}

	CO::RE()->redirect('/file-manager.php');