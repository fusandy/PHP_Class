<?php
date_default_timezone_set('Asia/Taipei');

echo '<br>------timestamp-------<br>';
echo time(); // 拿到的是timestamp
echo '<br>------當下時間-------<br>';
echo date("Y-m-d H:i:s");
echo '<br>------三十天後-------<br>';
echo date("Y-m-d H:i:s", time()+30*24*60*60);
echo '<br>-------timestamp老舊用法------<br>';
echo strtotime("2021/6/20"); // 拿到的是timestamp
?>