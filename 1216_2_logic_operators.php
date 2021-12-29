<?php
$a = 5;
$b = 7;

echo $a && $b;  // true 輸出到頁面會變成 1
echo '<br> -------------- <br>';
echo ! $a;  // false 輸出到頁面會變成空字串
echo '<br> -------------- <br>';

$c = 0 or $b;  // 等號優先權大於 or ; and 也同理
echo $c? 'TRUE' : 'FALSE';
echo '<br> -------------- <br>';
$c = 0 || $b;
echo $c? 'TRUE' : 'FALSE';

?>