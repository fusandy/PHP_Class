<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1216 echo</title>
</head>

<body>
    <!-- 常數 -->
    <div>
        <?php
    echo 'Hello';
    echo '<br>';
    echo 123 + 345 ; 
    echo '<br>';
    echo 'Charlie' . ' Hello'.'<br>';
    echo __DIR__;
    echo '<br>';
    echo __FILE__;
    echo '<br>';
    echo __LINE__;
    echo '<br>';

    define('MY_CONST', 999);
    echo MY_CONST;
    echo '<br>';
    echo '---------------------';
    ?>
    </div>
    <!-- 變數 -->
    <div>
        <?php
    $my_var = 66;
    $b='22';
    $c='abc';
    echo $my_var + $b;
    echo '<br>';
    // echo $my_var + $c;
    $n = 'name';
    $$n = 'Charlie';
    echo $name;
    echo '<br>';
    echo '---------------------';
    ?>
    </div>
    <!-- 字串 -->
    <div>
        <?php
    $name1 = 'Victor';
    echo "Hello, $name1";
    echo '<br>';
    echo 'Hello, $name1';  
    echo '<br>';
    echo '---------------------';
    ?>
    </div>
    <div>
        <?php
    $name2 = 'Shelly';
    echo "Hello, {$name2}123";
    echo '<br>';
    echo "Hello, ${name2}123";
    echo '<br>';
    echo '---------------------';
    ?>
    </div>
    <!-- 單雙引號跳脫 -->
    <div>
        <?php
        $x="xyz\nabc\"def\'ghi\\";
        $y='xyz\nabc\"def\'ghi\\';
        echo $x;
        echo '<br>';
        echo $y;
        ?>
    </div>
</body>

</html>