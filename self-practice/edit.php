<?php
require __DIR__.'/parts/_connect_db.php';
// 如果沒登入，直接跳轉到首頁
if(!isset($_SESSION['admin'])){
    header("Location: index_.php");
    exit;
}

$title='修改資料';

// 如果沒有拿到primary key，畫面直接跳轉回list.php
if(! isset($_GET['sid'])){
    header("Location: list.php");
    exit;
}

$sid = intval(($_GET['sid']));
// 呈現編輯的表單
$row=$pdo->query("SELECT * FROM `address_book` WHERE sid=$sid")->fetch();
if(empty($row)){
    header("Location: list.php");
    exit;
};
           
?>

<?php include __DIR__.'/parts/__html_head.php' ?>
<?php include __DIR__.'/parts/__html_navbar.php' ?>
<style>
    form .form-text{
        color:red;
    }
</style>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">修改通訊資料</h5>
                        <!-- 拿到資料後把sid對應到的各欄位值塞進表單 -->
                        <form name="form1" onsubmit="sendData(); return false">
                        <!-- 隱藏欄位，為了api取得sid -->
                        <input type="hidden" name="sid" value="<?= $row['sid'] ?>">

                            <div class="mb-3">
                                <label for="name" class="form-label">name<span style="color:red">*</span></label>
                                <input type="text" class="form-control" id="name" name="name"
                                value="<?= htmlentities($row['name']) ?>">
                                <div class="form-text"></div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                value="<?= $row['email'] ?>">
                                <div class="form-text"></div>
                            </div>

                            <div class="mb-3">
                                <label for="mobile" class="form-label">mobile(09XX-XXX-XXX)</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" 
                                data-pattern="09\d{2}-?\d{3}-?\d{3}" value="<?= $row['mobile'] ?>">
                                <div class="form-text"></div>
                            </div>

                            <div class="mb-3">
                                <label for="birthday" class="form-label">birthday</label>
                                <input type="date" class="form-control" id="birthday" name="birthday"
                                value="<?= $row['birthday'] ?>">
                                <div class="form-text"></div>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">address</label>
                                <textarea class="form-control" name="address" id="address" cols="30" rows="3"><?= $row['address'] ?></textarea>
                                <div class="form-text"></div>
                            </div>
                            <button type="submit" class="btn btn-primary">提交修改</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">資料錯誤</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include __DIR__.'/parts/__scripts.php' ?>
<script>
    const name = document.querySelector('#name');
    const email = document.querySelector('#email');
    const mobile = document.querySelector('#mobile');

    const modal = new bootstrap.Modal(document.querySelector('#exampleModal'));

    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;

    function sendData(){
    
        
        name.nextElementSibling.innerHTML = '';
        email.nextElementSibling.innerHTML = '';
        mobile.nextElementSibling.innerHTML = '';

        
        let isPass = true;
        if(name.value.length<2){
            isPass = false;
            name.nextElementSibling.innerHTML = '請輸入正確的姓名';
        };

        if(email.value && !email_re.test(email.value)){
            isPass = false;
            email.nextElementSibling.innerHTML = '請輸入正確的email';
        }

        if(mobile.value && !mobile_re.test(mobile.value)){
            isPass = false;
            mobile.nextElementSibling.innerHTML = '請輸入正確的手機號碼';
        }


        // 傳送資料
        if(isPass){
            const fd = new FormData(document.form1); 

            fetch('edit_api.php', {
                method:"POST",
                body:fd,
            }).then(r=>r.json())   
            .then(obj=>{
                console.log(obj);  
                if(obj.success){
                    alert('修改成功'); 
                    location.href='list.php';  
                }else{
                    document.querySelector('.modal-body').innerHTML = obj.error || '資料修改發生錯誤';
                    modal.show();
                }
            })
        }
    }
</script>
<?php include __DIR__.'/parts/__html_foot.php' ?>

