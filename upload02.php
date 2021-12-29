<?php
// 搬動上傳的資料
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
    'success' => false,
    'error' => '',
];


// 判斷是否上傳檔案為空
if(! empty($_FILES['myfile'])){
    $ext = $exts[$_FILES['myfile']['type']] ?? '';      
    // 拿到對應的副檔名，如果檔名不是image其中一個，就給空字串，跳到else:$output['error']='沒有上傳檔案'
    
    if(! empty($ext)){      // 判斷有沒有正常拿到副檔名
        $filename = sha1($_FILES['myfile']['name']. rand()).$ext;  // 亂數決定檔名，並與副檔名相接
        $target = $upload_folder.'/'.$filename;    // target檔名相接

        if(move_uploaded_file($_FILES['myfile']['tmp_name'],$target)){
            $output['success']=true;
            $output['filename']=$filename;   // 輸出檔名給前端
        }else{
            $output['error']='無法移動檔案';
        }

    } else {   // 如果$ext副檔名不是.jpg/.png/.gif類型
        $output['error']='不符合圖片檔案類型';
    }   

} else{   // 如果沒抓到檔案
    $output['error']='沒有上傳檔案';
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);


?>