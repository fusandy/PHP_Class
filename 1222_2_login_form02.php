<?php
    $users = [
        'Sandy' => [
                'nickname' => '珊迪',
                'pw' => '12345',
        ],
        'john' => [
            'nickname' => '小強',
            'pw' => '7890'
        ],
        'bill' => [
            'nickname' => '比爾',
            'pw' => 'abcde'
        ],
    ];

    session_start();
    $badLogin = false;  //預設登入錯誤是false
    
    // 判斷有沒有傳送account與password的值進來
    if(isset($_POST['account']) and isset($_POST['password'])){
        $badLogin = true; //登入錯誤若是true，跳離if判斷式
        
        // 判斷收到的account是否是$users內的account
        if(isset($users[$_POST['account']])){

            // 如果是的話，用$item接這個帳號變數陣列
            $item = $users[$_POST['account']];

            // 判斷收到的password是否等於$item變數陣列裡的pw
            if($item['pw'] == $_POST['password']){
                
                // 是的話，建立sessionID
                // session的變數也可以是陣列
                $_SESSION['logInUser2'] = [
                    'account' => $_POST['account'],
                    'nickname' => $item['nickname']
                ];

                // $badLogin = false;
            }
        }
    };       

?>

<?php include './1220_4__html_head.php';?>   

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                        <!-- 如果成功登入，顯示 Welcome Back -->
                        <?php if(isset($_SESSION['logInUser2'])): ?>
                            <h5 class="card-title">Welcome Back <?= $_SESSION['logInUser2']['nickname'] ?> </h5>
                            <button style="border:0px; border-radius:3px;"><a href="1222_2_logout02.php">Log out</a></button>
                        
                            <!-- 如果帳號密碼錯誤，跳提示訊息 -->
                        <?php else: ?>
                            <h5 class="card-title">Login</h5>
                            <?php if($badLogin): ?>
                            <div class="alert alert-danger" role="alert">帳號或密碼錯誤</div>
                        <?php endif; ?>    
                                               
                            <form method="post" > 
                                <div class="mb-3">
                                    <label for="account" class="form-label">Account</label>
                                    <input type="text" name="account" class="form-control" id="account"
                                    value="<?=isset($_POST['account'])? htmlentities($_POST['account']):'' ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" 
                                    value="<?=isset($_POST['password'])? htmlentities($_POST['password']):'' ?>">
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