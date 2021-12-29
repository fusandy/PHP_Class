<!-- 關聯式陣列 -->
<pre>
    <?php
        // 傳統用法
        $ar = array(
            3 => 23,
            'name' => 'David',
            'age' => 30,
        );  

        // 也可以用JS方式
        $ar2 = [
            3 => 23,
            'name' => 'David',
            'age' => 30,
        ];

        echo '<br>------$ar-------<br>';
        print_r($ar);
        echo '<br>------$ar2------<br>';
        var_dump($ar2);

        echo '<br>------$ar push new element-------<br>';

        $ar['gender']='male';
        print_r($ar);

        echo '<br>-------------<br>';

        echo '$ar長度: ';
        echo count($ar);

        echo '<br>-------------<br>';

        echo '$ar2[name]取值: ';
        echo $ar2['name'];

    

    ?>
</pre>