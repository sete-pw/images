<?
$data = CO::RE()->get;
$dataReturn = json_decode('{}');
$dataReturn->status = json_decode('{}');

if (isset($data['category'])){
    $query = CO::SQL()->query("
SELECT id_image, CONCAT('/preview/',url) as url, transition
FROM images
WHERE category = ?
    ",[
        ['s',mb_strtolower(strip_tags(trim($data['category'])))]
    ]);
    $dataReturn->status = 'success';
    $dataReturn->responce = $query;
    echo json_encode($dataReturn);
}else{
    $dataReturn->status = 'error';
    echo json_encode($dataReturn);
}