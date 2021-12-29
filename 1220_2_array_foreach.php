<pre>
    <?php
    // 索引式陣列 foreach
    echo '<br>------foreach($ar as $value)-------<br>';
    $ar = array(2, 3, 5, 9, 10);
    foreach ($ar as $v) {
        echo "$v,";
    }

    echo '<br>------foreach($ar as $key => $value)-------<br>';
    $ar = array(2, 3, 5, 9, 10);
    foreach ($ar as $k => $v2) {
        echo "$k => $v2 <br>";
    }

    // 關聯式陣列 foreach
    echo '<br>------foreach($ar as $key => $value)-------<br>';
    $ar2 = [
        'name' => 'Charlie',
        'age' => 30,
        'gender' => 'male',
        'nationality' => 'Taiwan',
    ];
    foreach ($ar2 as $key => $value) {
        echo "$key => $value <br>";
    }
    ?>
</pre>