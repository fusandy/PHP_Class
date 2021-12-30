<?php
require __DIR__.'/parts/_connect_db.php';

// if(! isset($_SESSION['admin'])){
//     header("Location: list_no_admin.php");
//     exit;
// }

$title = '購物車-經典商品';
$pageName = 'cart_classic';

$perPage=5;

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

if($page<1){
    header('Location: cart_classic.php');
    exit;
}

$t_sql = "SELECT COUNT(1) FROM classic_orders";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$totalPages = ceil($totalRows/$perPage);
if($page>$totalPages){
    header('Location: cart_classic.php?page='.$totalPages);
    exit;
}

$sql = sprintf("SELECT * FROM `classic_orders` ORDER BY orders_id ASC LIMIT %s, %s", ($page-1)*$perPage, $perPage);

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
                        <li class="page-item <?= 1==$page?'disabled':'' ?>">
                            <!-- 上一頁的連結 -->
                            <a class="page-link" href="?page=<?= $page-1 ?>">
                            <i class="fas fa-chevron-left"></i>
                            </a>
                        </li>
                        
                        <!-- 利用for迴圈跑出分頁按鈕 -->
                        <?php for($i=1; $i<=$totalPages; $i++): ?>
                            <li class="page-item <?= $i==$page?'active':'' ?> ">
                                <a class="page-link" href="?page=<?=$i?>"><?=$i?></a>
                            </li>
                        <?php endfor; ?>
                        

                        <!-- 只顯示當前面與前後各2頁，共五個按鈕 -->
                        <!-- <?php for($i=$page-2; $i<=$page+2; $i++)
                            if($i>=1 && $i <= $totalPages): 
                        ?>
                            <li class="page-item <?= $i==$page?'active':'' ?> ">
                                <a class="page-link" href="?page=<?=$i?>"><?=$i?></a>
                            </li>
                        <?php endif; ?> -->
                    

                        <!-- 向右箭頭 -->
                        <li class="page-item <?= $totalPages==$page?'disabled':'' ?>">
                            <!-- 下一頁的連結 -->
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
                        <th scope="col">訂單品項id</th>
                        <th scope="col">購物車id</th>
                        <th scope="col">經典商品id</th>
                        <th scope="col">訂單品項單價</th>
                        <th scope="col">訂單品項數量</th>
                        <th scope="col">產品類別</th>
                        <th scope="col">會員id</th>
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
                            <a href="javascript: delete_it(<?= $r['orders_id'] ?>)">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                        <td><?= $r['orders_id'] ?></td>
                        <td><?= $r['cart_id'] ?></td>
                        <td><?= $r['product_id'] ?></td>
                        <td><?= $r['orders_value'] ?></td>
                        <td><?= $r['orders_amount'] ?></td>
                        <td><?= $r['product_category'] ?></td>
                        <td><?= $r['member_id'] ?></td>
                        <td>
                            <a href="cart_classic_edit.php?orders_id=<?= $r['orders_id'] ?>">
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
        function delete_it(orders_id){
            if(confirm(`確定要刪除第${orders_id}筆的資料嗎?`)){
                location.href=`cart_delete.php?orders_id=${orders_id}`;
            }
        }
    </script>
<?php include __DIR__.'/parts/__html_foot.php' ?>