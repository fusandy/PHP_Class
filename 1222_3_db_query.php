<?php
    require __DIR__.'/1222_3_connect_db.php';
    
    // 讀取資料庫
    $sql = "SELECT * FROM address_book LIMIT 10";

    // 執行SQL，使用query這個方法，交給代理物件 $stmt
    $stmt = $pdo->query($sql);

    // fetch取值方式 : PDO:FETCH_ASSOC(關聯式陣列)，PDO:FETCH_NUM(索引式陣列) 和 PDO:FETCH_BOTH
    // $row = $stmt->fetch();
    // $row = $stmt->fetchAll() fetchAll是取得所有資料

    // while取的到資料就是true，取不到資料會是false
    // 第一筆取到後，會自動指向第二筆
	// 值到取完10筆後，變成false覆值給$row離開迴圈

    while($row = $stmt->fetch()){      
        echo "{$row['name']} <br>";
    };

    echo json_encode(($row));   // $row在while迴圈最後是false跳出迴圈後，所以這裡echo出false

?>