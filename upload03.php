<?php
// 上傳多個圖片檔
header('Content-Type: application/json');

// 搬動到哪個資料夾
$upload_folder = __DIR__.'/uploaded';

// 利用副檔名篩選檔案類型
$exts = [
    'image/jpeg' => '.jpg',
    'image/png' => '.png',
    'image/gif' => '.gif',
];


$output = [
    'success' => 0,  //成功上傳的數量
    'error' => '',
    'files' => [],  //成功上傳會進入陣列
];

// 判斷前端傳過來的myfiles[]是否為空 且 myfiles[]中的name是否為空
if(!empty($_FILES['myfiles']) and !empty($_FILES['myfiles']['name'])){

    // 多個檔案跑 foreach(key as value)迴圈
    // $i是索引值
    // foreach (iterable_expression as $key => $value){
    //     statement
    // };
    foreach($_FILES['myfiles']['name'] as $i=>$name){
        // $ext 拿到的是陣列
        $ext = $exts[$_FILES['myfiles']['type'][$i]] ?? ''; 
        
        if(! empty($ext)){      
            $filename = sha1($name. rand()).$ext;  

            $target = $upload_folder.'/'.$filename;    
    
            if(move_uploaded_file($_FILES['myfiles']['tmp_name'][$i],$target)){
                $output['success'] ++;
                $output['files'][] = $filename;    //push檔名進去files=[]
            }else{
                // $output['error']='無法移動檔案';
            }
        } else {   
            // $output['error']='不符合圖片檔案類型';
        } 
    }
} else{  
    $output['error']='沒有上傳檔案';
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);


?>