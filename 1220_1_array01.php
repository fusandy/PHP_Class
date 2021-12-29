<!-- 索引式陣列 -->
<pre>
    <?php
        // 傳統用法
        $ar = array(3,2,2,0,4,1);  
        // 也可以用JS方式
        $ar2 = [3,2,2,0,4,1];

        // 只用在array
        print_r($ar);
        // 任何類型
        var_dump($ar2);

        // []即可建立陣列或是push元素值
        $ar[]=100;
        print_r($ar);

        $br[]=0;
        $br[]=1;
        $br[]=2;
        $br[]=3;
        $br[]=4;
        print_r($br);

    ?>
</pre>