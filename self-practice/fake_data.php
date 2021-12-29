<?php
require __DIR__.'/parts/_connect_db.php';

$sql = "INSERT INTO `address_book`(
    `name`, `email`, `mobile`, `birthday`, `address`, `created_at`
     ) VALUES (?,?,?,?,?, NOW())";

$pdo->beginTransaction();

$stmt = $pdo->prepare($sql);

for($i=0; $i<100; $i++){
    $stmt->execute([
        '茱莉亞'.$i,
        "Julia{$i}@test.com",
        '09'.str_shuffle('12345678'),
        date("Y-m-d", rand(100000,1640571018)),
        '台北市',    
    ]);
}

$pdo->commit();


echo 'ok';