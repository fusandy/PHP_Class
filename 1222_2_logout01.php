<?php
    session_start();
    // 僅只清除$_SESSION['logInUser']這個變數
    // 若使用session_destroy()會導致登出後，連同未結帳的購物車品項等等紀錄都被清除
    unset($_SESSION['logInUser1']);
    // 登出後跳轉回指定頁面
    header("Location: 1222_2_login_form01.php");
?>

