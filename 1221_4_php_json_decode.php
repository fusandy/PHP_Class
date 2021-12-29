<pre>
    <?php
    $str = '{"name":"李小明" , "age":19}';
    
    echo '<br>------轉換為陣列-------<br>';
    $ar = json_decode($str, true);
    var_dump(($ar));

    echo '<br>------轉換為物件-------<br>';
    $obj = json_decode($str);
    var_dump(($obj));

    echo '<br>------$ar的"name"-------<br>';
    echo " {$ar['name']}  \n";  //取得陣列的value

    echo '<br>------$obj的"name"-------<br>';
    echo " {$obj -> name}  \n";   //取得物件的屬性

    ?>
</pre>