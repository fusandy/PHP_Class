<?php
require __DIR__.'/parts/_connect_db.php';

// 從前端寫入資料
// insert.php 最後fetch得到的前端資料，會傳到這裡來

$output = [
    'success' => false,
    'code' => 0,   // code可用可不用，有寫的話除錯比較好知道卡在哪
    'error' => '',
];

if(! isset($_SESSION['admin'])){
    $output['error'] = '請登入管理者帳號';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$mobile = $_POST['mobile'] ?? '';

// PHP再次檢查前端傳送過來的欄位資料
// 因為 name, email, mobile 加入if判斷式，故變成必填項目
if(empty($name)){
    $output['code'] = 401;
    $output['error'] = '請輸入正確的姓名';
    echo json_encode($output, JSON_UNESCAPED_UNICODE); exit;
};

// 進入資料庫前檢查email格式
if(empty($email) or !filter_var($email, FILTER_VALIDATE_EMAIL)){
    $output['code'] = 405;
    $output['error'] = '請輸入正確的email';
    echo json_encode($output, JSON_UNESCAPED_UNICODE); exit;
}

// 進入資料庫前檢查手機格式
if(empty($mobile) or !preg_match("/^09\d{2}-?\d{3}-?\d{3}$/", $mobile)){
    $output['code'] = 407;
    $output['error'] = '請輸入正確的mobile';
    echo json_encode($output, JSON_UNESCAPED_UNICODE); exit;
}

// INSERT是新增
$sql = "INSERT INTO `address_book`(
    `name`, `email`, `mobile`, `birthday`, `address`, `created_at`
     ) VALUES (?,?,?,?,?, NOW())";

// 建立一個$stmt物件，準備執行$sql
$stmt = $pdo->prepare($sql);

// 執行寫入用戶輸入的資料
// 用array，有多少個問號寫多少個值
$stmt->execute([
    $name,
    $email,
    $mobile,
    empty($_POST['birthday']) ? NULL : $_POST['birthday'],
    $_POST['address'] ?? '',  //不是必填，有或沒有無所謂
]);

// rowCount可以知道有沒有成功寫進去，有寫進去會顯示寫進去的筆數
$output['success'] = $stmt->rowCount()==1;     // ans success:true 
// $stmt->rowCount()的結果=1，然後1==1，判斷是true
$output['rowCount'] = $stmt->rowCount();       // ans rowCount:1


// 用JSON解析用戶傳送的資料
echo json_encode($output,JSON_UNESCAPED_UNICODE);


// 錯誤的作法
// 用戶若輸入內容含有單引號，就會造成SQL injection
// 除非非常確定insert的資料室全數質，才能用sprintf
// $sql = sprintf("INSERT INTO `address_book`(
//     `name`, `email`, `mobile`, `birthday`, `address`, `created_at`
//     ) VALUES ('%s','%s','%s','%s','%s', NOW())",
    
//     // 如果沒有輸入欄位的值，就回傳空字串
//     $_POST['name'] ?? '',
//     $_POST['email'] ?? '',
//     $_POST['mobile'] ?? '',
//     $_POST['birthday'] ?? '',
//     $_POST['address'] ?? '',
// );
// $stmt = $pdo->query($sql);

?>