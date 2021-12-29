<?php

setcookie('my_key3','abcd', 0, '/', '127.0.0.1');
setcookie('my_key3','abcd', 0, '/');
echo $_COOKIE['my_key3'];

?>