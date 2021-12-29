<pre>
    <?php
        $ar = [
            'name' => 'Charlie',
            'age' => 30,
            'gender' => 'male',
            'nationality' => 'Taiwan',
        ];
        
        $br = $ar;   // copy拷貝複製
        $cr = &$ar;  // reference設定位置(參照)
        $ar['nationality'] = 'Japan';

        print_r($ar);
        print_r($br);
        print_r($cr);

        echo '<br>-------------<br>';

        $a = 10;
        $b = &$a;
        $b = 5;
        echo('參照設定，$a: ');
        echo($a);
        
    ?>
</pre>