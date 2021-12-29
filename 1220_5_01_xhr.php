<?php include './1220_4__html_head.php';?>   
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> Total: </h5>

                    <form onsubmit="sendData(); return false;">
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
    // 傳統AJAX方式傳送資料到 1220_5_03_xhr_api.php
    function sendData(){
        const a = document.querySelector('#a').value;
        const b = document.querySelector('#b').value;

        const xhr = new XMLHttpRequest();
        xhr.onload = function(){
            // 資料從1220_5_03_xhr_api.php載入進來要做什麼事情
            document.querySelector('.card-title').innerHTML = xhr.responseText;
        }

        // 可以用GET，也可以用POST
        xhr.open('GET', `1220_5_03_xhr_api.php?a=${a}&b=${b}`);
        xhr.send();
    }
 
    </script>
<?php include __DIR__.'/1220_4__html_foot.php';?>