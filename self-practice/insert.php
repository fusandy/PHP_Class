<?php
require __DIR__.'/parts/_connect_db.php';
// 如果沒登入，直接跳轉到首頁，看不到List
if(! isset($_SESSION['admin'])){
    header("Location: index_.php");
    exit;
}

$title='新增通訊資料';
$pageName = 'insert';

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
                        <h5 class="card-title">新增通訊資料</h5>
                        <!-- 給name=form1搭配AJAX，建議不要使用傳統的post + action的方法 -->
                        <!-- <form name="form1" method="post" action="" -->
                        <!-- return false會讓用戶提交表單後，頁面不會刷新，若有打錯就可以直接修改 -->
                        <form name="form1" onsubmit="sendData(); return false">
                            <div class="mb-3">
                                <label for="name" class="form-label">name<span style="color:red">*</span></label>
                                <!-- input一定要給name!!!!! -->
                                <input type="text" class="form-control" id="name" name="name" required>
                                <div class="form-text"></div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">email</label>
                                <input type="email" class="form-control" id="email" name="email">
                                <div class="form-text"></div>
                            </div>

                            <div class="mb-3">
                                <label for="mobile" class="form-label">mobile(09XX-XXX-XXX)</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" 
                                data-pattern="09\d{2}-?\d{3}-?\d{3}">
                                <!-- "data-"+屬性名稱 : 代表自定義的，寫在行內不會生效  -->
                                <div class="form-text"></div>
                            </div>

                            <div class="mb-3">
                                <label for="birthday" class="form-label">birthday</label>
                                <input type="date" class="form-control" id="birthday" name="birthday">
                                <div class="form-text"></div>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">address</label>
                                <textarea class="form-control" name="address" id="address" cols="30" rows="3"></textarea>
                                <div class="form-text"></div>
                            </div>
                            <!-- 表單內只要有button標籤，預設的type不寫都會是submit，資料沒填完都會送出資料，要改成type="button"才不會傳送資料 -->
                            <button type="su  bmit" class="btn btn-primary">Submit</button>
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

    // 因為把modal的button刪掉了，所以要藉由javascript來處理互動
    const modal = new bootstrap.Modal(document.querySelector('#exampleModal'));

    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;

    function sendData(){
    
        // 檢查表單的資料

        // <div class="form-text"></div> 這欄的innerHTML預設先是空字串
        name.nextElementSibling.innerHTML = '';
        email.nextElementSibling.innerHTML = '';
        mobile.nextElementSibling.innerHTML = '';

        // 預設pass是true，但只要name, email, mobile檢查的時候任一欄是false，就不要送資料
        let isPass = true;
        if(name.value.length<2){
            isPass = false;
            name.nextElementSibling.innerHTML = '請輸入正確的姓名';
        };

        // 如果有填email的值，就要test填寫的內容是否符合email規範
        // !email_re.test(email.value) 不等於 = true
        if(email.value && !email_re.test(email.value)){
            isPass = false;
            email.nextElementSibling.innerHTML = '請輸入正確的email';
        }

        // 如果有填mobile的值，就要test填寫的內容是否符合mobile規範
        // !mobile_re.test(mobile.value) 不等於 = true
        if(mobile.value && !mobile_re.test(mobile.value)){
            isPass = false;
            mobile.nextElementSibling.innerHTML = '請輸入正確的手機號碼';
        }


        // 傳送資料
        if(isPass){
            const fd = new FormData(document.form1); 
            // 定義一個變數去接收取得form1內的資料

            fetch('insert_api.php', {
                method:"POST",
                body:fd,
            }).then(r=>r.json())   //PHP的關聯式陣列用JSON轉換會成為Javascript的物件
            .then(obj=>{
                console.log(obj);  //結果會回傳回'insert_api.php'
                if(obj.success){
                    alert('新增成功'); 
                    location.href='list.php';  // 新增成功後跳轉回list.php
                }else{
                    // alert(obj.error || '資料新增時發生錯誤');  // 錯誤的話顯示錯誤提示
                    document.querySelector('.modal-body').innerHTML = obj.error || '資料新增發生錯誤';
                    modal.show();
                }
            })
        }
    }
        
        
        
</script>
<?php include __DIR__.'/parts/__html_foot.php' ?>

