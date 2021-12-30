<?php
require __DIR__.'/parts/_connect_db.php';

// if(!isset($_SESSION['admin'])){
//     header("Location: index_.php");
//     exit;
// }

$title='新增購物車明細';

if(! isset($_GET['orders_id'])){
    header("Location: cart_classic.php");
    exit;
};

$orders_id = intval(($_GET['orders_id']));

$row=$pdo->query("SELECT * FROM `classic_orders` WHERE orders_id=$orders_id")->fetch();
if(empty($row)){
    header("Location: cart_classic.php");
    exit;
};
           
?>