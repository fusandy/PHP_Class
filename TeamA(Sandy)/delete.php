<?php
require __DIR__.'/parts/_connect_db.php';
// 如果沒登入，直接跳轉到首頁
if(!isset($_SESSION['admin'])){
    header("Location: index_.php");
    exit;
}

// 若用戶針對指定sid按下刪除，判斷有沒有get到sid
if(isset($_GET['sid'])){
    // 有的話轉換為整數
    $sid = intval(($_GET['sid']));
    $pdo->query("DELETE FROM `address_book` WHERE sid=$sid");
};

// 完成之後跳轉
// 如果有HTTP_REFERER(從哪一頁來)就傳給$come_from(回哪一頁)，沒有的話就跳去列表頁
$come_from = $_server['HTTP_REFERER'] ?? 'list.php';
header("Location: $come_from");
