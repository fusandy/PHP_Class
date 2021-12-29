<?php

function multi($a, $b = 10)
{
    return $a * $b;
}

echo '<br>------multi(6,7)-------<br>';
echo multi(6, 7);
echo '<br>------multi(8)-------<br>';
echo multi(8);

?>