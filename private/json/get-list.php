<?
$data = CO::RE()->get;
$dataReturn = json_decode('{}');

$dataReturn->status = json_decode('{}');

if (isset($data['category'])){
    $query = CO::SQL()->query("
SELECT id_image, CONCAT('/image/',url,'_small') as url, category, transition, user_id
FROM images
WHERE category = ?
    ",[
        ['s',strip_tags(trim($data['category']))]
    ]);
    $dataReturn->status = 'success';
    $dataReturn->responce = $query;
    echo json_encode($dataReturn);
}else{
    $dataReturn->status = 'error';
    echo json_encode($dataReturn);
}