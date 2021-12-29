<?php
    session_start();

    // 判斷有沒有傳送account與password的值進來
    if(isset($_POST['account']) and isset($_POST['password'])){
        // 有的話，判斷account與password是否與帳號密碼一致 (這邊先用寫死的方式)
        if($_POST['account']=='Sandy' and $_POST['password']=='12345'){
            // 一致的話，傳送session，並設定session的變數值
            $_SESSION['logInUser1'] = 'Sandy';
        };       
    };
?>

<?php include './1220_4__html_head.php';?>   

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                        <!-- 如果成功登入，顯示 Welcome Back -->
                        <?php if(isset($_SESSION['logInUser1'])): ?>
                            <h5 class="card-title">Welcome Back <?= $_SESSION['logInUser1'] ?> </h5>
                            <button style="border:0px; border-radius:3px;"><a href="1222_2_logout01.php">Log out</a></button>
                            <!-- 如果沒有登入，顯示登入表單 -->
                        <?php else: ?>
                            <h5 class="card-title">Log In</h5>
                            <form method="post" > 
                                <div class="mb-3">
                                    <label for="account" class="form-label">Account</label>
                                    <input type="text" name="account" class="form-control" id="account">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__.'/1220_4__scripts.php';?>
<?php include __DIR__.'/1220_4__html_foot.php';?>