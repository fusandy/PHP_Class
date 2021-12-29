<!-- 用AJAX fetch方式傳送資料 -->

<?php include './1220_4__html_head.php';?>   
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> Total: </h5>

                    <form name="form1" onsubmit="sendData(); return false;">
                        <div class="mb-3">
                            <label for="a" class="form-label">a</label>
                            <input type="number" name="a" class="form-control" id="a">
                        </div>
                        <div class="mb-3">
                            <label for="b" class="form-label">b</label>
                            <input type="number" name="b" class="form-control" id="b">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__.'/1220_4__scripts.php';?>
    <script>
        //async await
        
        // 把function宣告為async
        async function sendData(){
            const a = document.form1.a.value;
            const b = document.form1.b.value;

            const r = await fetch(`1220_5_03_xhr_api.php?a=${a}&b=${b}`);
            const txt = await r.text();
            document.querySelector('.card-title').innerHTML = txt; document.querySelector('.card-title').innerHTML = txt;
            
           
            // try {
            //     const r = await fetch(`1220_5_03_xhr_api.php?a=${a}&b=${b}`);
            //     const txt = await r.text();
            //     document.querySelector('.card-title').innerHTML = txt;
            // } catch(ex){
            //      // 處理錯誤
            // }
            

        }
    </script>
<?php include __DIR__.'/1220_4__html_foot.php';?>