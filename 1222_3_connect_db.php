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
    //PDOException:宣告類型，不可自行命名 ; $ex錯誤訊息，可自行命名
    echo "*****ERRRRRRRROR******". $ex->getMessage();
}



?>