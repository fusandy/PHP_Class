<?php
require __DIR__.'/parts/_connect_db.php';

// if(!isset($_SESSION['admin'])){
//     header("Location: index_.php");
//     exit;
// }

if(isset($_GET['orders_id'])){
    // 有的話轉換為整數
    $orders_id = intval(($_GET['orders_id']));
    $pdo->query("DELETE FROM `classic_orders` WHERE orders_id=$orders_id");
};

// 完成之後跳轉
// 如果有HTTP_REFERER(從哪一頁來)就傳給$come_from(回哪一頁)，沒有的話就跳去列表頁
$come_from = $_SERVER['HTTP_REFERER'] ?? 'cart_classic.php';
header("Location: $come_from");

