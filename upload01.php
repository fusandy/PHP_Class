<?php
// 查看上傳檔案的資料

// 設定content-type是JSON
header('Content-Type: application/json');
echo json_encode($_FILES);

?>