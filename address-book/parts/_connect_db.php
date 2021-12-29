<?php

$db_host = 'localhost';
$db_name = 'class_materials';
$db_user = 'root';
$db_pass = '';

$dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8";

$db_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
];

try{
    $pdo = new PDO($dsn,$db_user,$db_pass,$db_options);
} catch(PDOException $ex){
    echo "*****ERRRRRRRROR******". $ex->getMessage();
}


// 每一頁都會最先引入__connect_db.php這個檔案
// 先給空字串避免其他頁面沒有設定title跟pageName的時候，畫面顯示notice
$title='';
$pageName='';

// 判斷session有沒有啟動
if(! isset($_SESSION)){
    session_start();
}
?>