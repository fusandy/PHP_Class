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
                            <input type="number" name="a" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="b" class="form-label">b</label>
                            <input type="number" name="b" class="form-control">
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
    // fetch方式傳送資料，結果與AJAX xhr一樣
    function sendData(){
        // 假設form有name但沒有id的話，可以用以下方法
        // name(form1)會自動變成document底下的子物件，欄位名稱(a、b)會變成表單name的子物件
        const a = document.form1.a.value;
        const b = document.form1.b.value;

        // fetch(url) 直接是一個function，非同步
        // method若不寫，預設是GET
        fetch(`1220_5_03_xhr_api.php?a=${a}&b=${b}`)
                .then(r=>r.text())
                //  .then(function(response){
                //      return response.text();
                // })
                .then(txt=>{
                    document.querySelector('.card-title').innerHTML = txt;
                });
                // .then(function(txt){
                //      document.querySelector('.card-title').innerHTML = txt;
                // })

        }
 
    </script>
<?php include __DIR__.'/1220_4__html_foot.php';?>