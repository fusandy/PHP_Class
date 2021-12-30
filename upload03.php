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

    // myfiles[]且name不是空，就跑迴圈

    foreach($_FILES['myfiles']['name'] as $i=>$name){
        // $ext 拿到的是陣列
        $ext = $exts[$_FILES['myfiles']['type'][$i]] ?? '';   // 判斷副檔名
        
        // 如果副檔名符合不是empty
        if(! empty($ext)){      
            $filename = sha1($name. rand()).$ext;   // 檔名跑sha1，且把$ext副檔名加回來

            $target = $upload_folder.'/'.$filename;     // 確定好目標路徑
    
            if(move_uploaded_file($_FILES['myfiles']['tmp_name'][$i],$target)){
                $output['success'] ++;
                $output['files'][] = $filename;    //push檔名進去files=[]
            }else{
                $output['error']='無法移動檔案';
            }
        } else {   
            // $output['error']='不符合圖片檔案類型';
        } 
    }
} else{  
    $output['error']='沒有上傳檔案';
}

// 最後用JSON_encode把$output編碼打包送回去前端
// JSON_UNESCAPED_UNICODE 只為了人類看 (ex. 中文字不會是編碼)
echo json_encode($output, JSON_UNESCAPED_UNICODE);


?>