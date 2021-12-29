<?php
    session_start();
?>

<?php include __DIR__.'/parts/__html_head.php' ?>
<?php include __DIR__.'/parts/__html_navbar.php' ?>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Login</h5>     
                    <form name="form1" onsubmit="doLogin(); return false" > 
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
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__.'/parts/__scripts.php' ?>
<script>
    function doLogin(){
        const fd = new FormData(document.form1);

        fetch('login-api.php',{
            method:'POST',
            body:fd,
        }).then(r=>r.json()).then(obj=>{
            if(obj.success){
                location.href = 'list.php';
            } else {
                alert(obj.error);
            }
            // console.log(obj);
        });
    }

</script>

<?php include __DIR__.'/parts/__html_foot.php' ?>