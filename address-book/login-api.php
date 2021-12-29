<?php
require __DIR__.'/parts/_connect_db.php';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '帳號或密碼錯誤',
];

$account = $_POST['account'] ?? '';
$password = $_POST['password'] ?? '';

if(empty($account) or empty($password)){
    $output['code'] = 01;
    $output['error'] = '帳號或密碼為空';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

// 只有一筆所以可以用sprintf
$sql = sprintf("SELECT * FROM `admins` WHERE `account`=%s", $pdo->quote($account));

$row = $pdo->query($sql)->fetch();
if(empty($row)){
    $output['code'] = 02;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

if(password_verify($password, $row['password'])){
    $output['success'] = true;
    $output['error'] = '';
    $_SESSION['admin'] = [
        'account' => $row['account'],
        'nickname' => $row['nickname'],
    ];
}else{
    $output['code'] = 03;
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);

?>