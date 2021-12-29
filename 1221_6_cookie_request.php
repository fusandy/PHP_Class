<?php

// 透過setcookie設定response headers，透過browser告訴server要設定cookie
setcookie('my_key','123456');
echo 'ok';

?>