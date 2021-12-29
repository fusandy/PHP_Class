<pre>
    <?php
        $ar = [
            'name' => 'Charlie',
            'age' => 30,
            'gender' => 'male',
            'nationality' => 'Taiwan',
        ];
        
        foreach($ar as $v){
            $v .= '---';
        }
        print_r($ar);
        
        echo '<br>------ &$v為參照設定，取得array的value後，.="---"會直接修改$ar內的原始value-------<br>';
        foreach($ar as &$v){
            $v .= '---';
        }
        print_r($ar);
    ?>
</pre>