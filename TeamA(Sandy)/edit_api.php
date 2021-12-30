<?php
require __DIR__.'/parts/_connect_db.php';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '',
];

// 修改資料，一定得先知道primary key是多少
// $_POST['sid'] 來自於edit.php隱藏欄位的sid
$sid = isset($_POST['sid'])? intval($_POST['sid']):0;
if(empty($sid)){
    $output['code'] = 400;
    $output['error'] = '沒有sid';
    echo json_encode($output, JSON_UNESCAPED_UNICODE); exit;
}


$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$mobile = $_POST['mobile'] ?? '';


if(empty($name)){
    $output['code'] = 401;
    $output['error'] = '請輸入正確的姓名';
    echo json_encode($output, JSON_UNESCAPED_UNICODE); exit;
};

if(empty($email) or !filter_var($email, FILTER_VALIDATE_EMAIL)){
    $output['code'] = 405;
    $output['error'] = '請輸入正確的email';
    echo json_encode($output, JSON_UNESCAPED_UNICODE); exit;
}

if(empty($mobile) or !preg_match("/^09\d{2}-?\d{3}-?\d{3}$/", $mobile)){
    $output['code'] = 407;
    $output['error'] = '請輸入正確的mobile';
    echo json_encode($output, JSON_UNESCAPED_UNICODE); exit;
}

// UPDATE
// 正規表示法批量修改 '\[value-\d\]'
$sql = "UPDATE `address_book` SET 
            `name`=?,
            `email`=?,
            `mobile`=?,
            `birthday`=?,
            `address`=?
            WHERE `sid`=?";

$stmt = $pdo->prepare($sql);

// 寫入用戶輸入的資料
$stmt->execute([
    $name,
    $email,
    $mobile,
    empty($_POST['birthday']) ? NULL : $_POST['birthday'],
    $_POST['address'] ?? '',
    $sid
]);


// 如果所有資料跟原本都一樣，rowCount會是0
if($stmt->rowCount()==0){
    $output['error']='資料沒有修改';
} else {
    $output['success']= true;
}


// 用JSON解析用戶傳送的資料
echo json_encode($output,JSON_UNESCAPED_UNICODE);


?>