<?php
require __DIR__.'/parts/_connect_db.php';
// 如果沒登入，直接跳轉到首頁，看不到List
if(! isset($_SESSION['admin'])){
    header("Location: list_no_admin.php");
    exit;
}

$title = '通訊錄列表';
$pageName = 'list';

    // 定義每一頁有幾筆資料
    $perPage=10;

    // 判斷用戶是否有選擇頁數
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

    // 如果頁碼<1，直接轉向回 list.php
    if($page<1){
        header('Location: list.php');
        exit;
    }

    // 求得總筆數
    $t_sql = "SELECT COUNT(1) FROM address_book";
    // fetch( ) 的結果 : [ 'COUNT(1)' => 26 ] 
	// fetch(PDO::FETCH_NUM) 用索引式陣列的結果 : [ 0 => 26 ] 
	// 只有一筆資料，故只求key=0的value
    $totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];

    // 求得總頁數
    $totalPages = ceil($totalRows/$perPage);
    
    // 如果頁碼>總頁數，直接轉向回最後一頁
    if($page>$totalPages){
        header('Location: list.php?page='.$totalPages);
        exit;
    }

    // 因為索引值是0，所以要-1開始算($page-1)*$perPage 
    $sql = sprintf("SELECT * FROM address_book ORDER BY sid DESC LIMIT %s, %s", ($page-1)*$perPage, $perPage);
    
    $rows = $pdo->query($sql)->fetchAll();
?>

<?php include __DIR__.'/parts/__html_head.php' ?>
<?php include __DIR__.'/parts/__html_navbar.php' ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <?= '總共'.$totalRows.'筆資料', '，共'.$totalPages.'頁' ?>
            </div>
        </div>
        <!-- 頁數按鈕 -->
        <div class="row">
            <div class="col">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <!-- 向左箭頭 -->
                        <!-- 如果1=page，上一頁的箭頭反灰 -->
                        <li class="page-item <?= 1==$page?'disabled':'' ?>">
                            <!-- 上一頁的連結 : href設定到當前頁面-1 -->
                            <a class="page-link" href="?page=<?= $page-1 ?>">
                            <i class="fas fa-chevron-left"></i>
                            </a>
                        </li>
                        
                        <!-- 利用for迴圈跑出分頁按鈕 -->
                        <!-- <?php for($i=1; $i<=$totalPages; $i++): ?>
                            <li class="page-item <?= $i==$page?'active':'' ?> ">
                                <a class="page-link" href="?page=<?=$i?>"><?=$i?></a>
                            </li>
                        <?php endfor; ?> -->
                        

                        <!-- 只顯示當前面與前後各2頁，共五個按鈕 -->
                        <?php for($i=$page-2; $i<=$page+2; $i++)
                            if($i>=1 && $i <= $totalPages): 
                        ?>
                            <li class="page-item <?= $i==$page?'active':'' ?> ">
                                <a class="page-link" href="?page=<?=$i?>"><?=$i?></a>
                            </li>
                        <?php endif; ?>
                        
                        <!-- 向右箭頭 -->
                        <!-- 如果最後一頁=page，下一頁的箭頭反灰 -->
                        <li class="page-item <?= $totalPages==$page?'disabled':'' ?>">
                            <!-- 下一頁的連結 : href設定到當前頁面+1 -->
                            <a class="page-link" href="?page=<?= $page+1 ?>">
                            <i class="fas fa-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <table class="table table-striped table-bordered;">
                <thead>
                    <tr>
                         <!-- 刪除、修改 -->
                        <th scope="col">
                        <input type="checkbox">
                        </th>
                        <th scope="col"><i class="fas fa-trash-alt"></i></th>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Birthday</th>
                        <th scope="col">Address</th>
                        <th scope="col"><i class="fas fa-edit"></i></th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($rows as $r): ?>
                    <tr>
                        <td>
                            <input class="del" type="checkbox">
                        </td>
                        <td>
                            <!-- confirm要不要刪除 -->
                            <!-- <a href="delete.php?sid=<?= $r['sid'] ?>" onclick="return confirm('確認要刪除嗎?')">
                                <i class="fas fa-trash-alt"></i>
                            </a> -->
                            <!-- a標籤假連結，在HTML呼叫Javascript的function -->
                            <a href="javascript: delete_it(<?= $r['sid'] ?>)">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                        <td><?= $r['sid'] ?></td>
                        <td><?= $r['name'] ?></td>
                        <td><?= $r['email'] ?></td>
                        <td><?= $r['mobile'] ?></td>
                        <td><?= $r['birthday'] ?></td>
                        <td><?= htmlentities($r['address']) ?></td>
                        <td>
                            <a href="edit.php?sid=<?= $r['sid'] ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
<?php include __DIR__.'/parts/__scripts.php' ?>
    <script>
        function delete_it(sid){
            if(confirm(`確定要刪除第${sid}筆的資料嗎?`)){
                // 如果是true，連到delete.php並傳送sid編號刪除資料
                location.href=`delete.php?sid=${sid}`;
            }
        }
    </script>
<?php include __DIR__.'/parts/__html_foot.php' ?>

