<?
$data = CO::RE()->post;

$dataReturn = json_decode('{}');
$dataReturn->status = json_decode('{}');

if (isset($data['category'])){
    $query = CO::SQL()->query("
SELECT id_image as id, url_ext, transition
FROM images
WHERE category = ?
    ",[
        ['s',mb_strtolower(strip_tags(trim($data['category'])), 'utf-8')]
    ]);

    foreach($query as &$img){
        $img['url'] = '/image/' . $img['url'] . '/preview';
    }

    $dataReturn->status = 'success';
    $dataReturn->response = $query;
    
}else{
    $dataReturn->status = 'error';
}

echo json_encode($dataReturn);