<?php include './1220_4__html_head.php';?>   
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__.'/1220_4__scripts.php';?>
    <script>
        //async await
        
        (async function sendData(){
            try {
                const r = await fetch(`1220_5_03_xhr_api.php?a=10&b=20`);
                const txt = await r.text();
                document.querySelector('.card-title').innerHTML += txt + '<br>';
            } catch(ex){
                // 處理錯誤
            }
        })(); //一進來就要執行function



        (async () => {
                try {
                    const r = await fetch(`1220_5_03_xhr_api.php?a=30&b=40`);
                    const txt = await r.text();
                    document.querySelector('.card-title').innerHTML += txt;
                } catch(ex){
                    // 處理錯誤
                }
        })();
 
    </script>
<?php include __DIR__.'/1220_4__html_foot.php';?>