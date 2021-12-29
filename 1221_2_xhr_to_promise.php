<!-- xhr非同步用Promise包起來 -->

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

        function remotePlus(a,b){
            return new Promise((resolve,reject)=>{
                const xhr = new XMLHttpRequest();
                xhr.onload = function(){
                    resolve( +xhr.responseText);
                }
                xhr.open('GET', `1220_5_xhr_api.php?a=${a}&b=${b}`);
                xhr.send();
            });
        }

        async function sendData(){
            const a = document.querySelector('#a').value;
            const b = document.querySelector('#b').value;
            document.querySelector('.card-title').innerHTML= await remotePlus(a,b);
        }
 
    </script>
<?php include __DIR__.'/1220_4__html_foot.php';?>