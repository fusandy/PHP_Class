<?php

$obj['username']=$_POST['username'];
$obj['useremail']=$_POST['useremail'];

echo json_encode($obj, JSON_UNESCAPED_UNICODE);

?>