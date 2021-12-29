<?php
require __DIR__.'/parts/_connect_db.php';
$title = '通訊錄列表';
$pageName = 'list';

   
    $perPage=10;
    
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    if($page<1){
        header('Location: list.php');
        exit;
    }
    
    $t_sql = "SELECT COUNT(1) FROM address_book";
    $totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
    $totalPages = ceil($totalRows/$perPage);
    if($page>$totalPages){
        header('Location: list.php?page='.$totalPages);
        exit;
    }

    $sql = sprintf("SELECT * FROM address_book ORDER BY sid DESC LIMIT %s, %s", ($page-1)*$perPage, $perPage);
    
    $rows = $pdo->query($sql)->fetchAll();
?>

<?php include __DIR__.'/parts/__html_head.php' ?>
<?php include __DIR__.'/parts/__html_navbar.php' ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table table-striped table-bordered;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Birthday</th>
                            <th scope="col">Address</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php include __DIR__.'/parts/__scripts.php' ?>
<?php include __DIR__.'/parts/__html_foot.php' ?>



