<?php 
    session_start();  //啟動session要在HTML宣告前
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    echo $_SESSION['aaa']  ='Welcome Back';  // 'aaa'只是變數名稱，每拜訪一次在網頁上echo 'Welcome Back'
    ?>
    
</body>
</html>