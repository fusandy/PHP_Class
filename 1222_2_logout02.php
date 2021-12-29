<?php
    session_start();
    
    unset($_SESSION['logInUser2']);
    // 跳轉回referer頁面，如果沒有referer就跳到指定頁面
    header("Location: ". ($_SERVER['HTTP_REFERER'] ?? '1222_2_login_form02.php'));

?>

