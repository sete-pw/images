<?
$data = CO::RE()->post;

$dataReturn = json_decode('{}');
$dataReturn->status = json_decode('{}');

if (isset($data['id'])){
    $query = CO::SQL()->query("
SELECT id_image as id, url, transition, user_id
FROM images
WHERE id_image = ?
    ",[
        ['i',(int)$data['id']]
    ]);

    if (count($query)==0){
        $dataReturn->status = 'error';
    }else{
        foreach($query as &$img){
            $img['url'] = '/image/' . $img['url'] . '/origin';
        }

        CO::SQL()->query("
UPDATE images
SET transition = transition + 1
WHERE id_image = ?
    ",[
            ['i',(int)$data['id']]
        ]);

        $dataReturn->status = 'success';
        $dataReturn->response = $query[0];
    }
}else{
    $dataReturn->status = 'error';
    
}

echo json_encode($dataReturn);