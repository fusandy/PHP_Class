<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>if else02</title>
</head>
<body>
    <!-- 第二種寫法 -->
    <?php
    $age = isset($_GET['age'])?intval($_GET['age']):0;
    if ($age>=18){
    ?>

        <h1>Hello</h1>

    <?php 
    } else {
    ?>

        <h1>NoNo</h1>
        
    <?php
    }
    ?>
    
</body>
</html>