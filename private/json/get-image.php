<?
$data = CO::RE()->get;
$dataReturn = json_decode('{}');
$dataReturn->status = json_decode('{}');

if (isset($data['id_image'])){
    $query = CO::SQL()->query("
SELECT id_image, CONCAT('/image/',url) as url, transition, user_id
FROM images
WHERE id_image = ?
    ",[
        ['i',(int)strip_tags(trim($data['id_image']))]
    ]);

    if (count($query)==0){
        $dataReturn->status = 'error';
        echo json_encode($dataReturn);
    }else{
        CO::SQL()->query("
UPDATE images
SET transition = transition + 1
WHERE id_image = ?
    ",[
            ['i',(int)strip_tags(trim($data['id_image']))]
        ]);
        $dataReturn->status = 'success';
        $dataReturn->responce = $query;
        echo json_encode($dataReturn);
    }
}else{
    $dataReturn->status = 'error';
    echo json_encode($dataReturn);
}

	