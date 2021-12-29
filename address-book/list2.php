<?php
require __DIR__.'/parts/_connect_db.php';

    $sql = "SELECT * FROM address_book";
    $rows = $pdo->query($sql)->fetchAll();  // 省去$stmt這個變數，$rows的結果是陣列
?>

<?php include __DIR__.'/parts/__html_head.php' ?>
<?php include __DIR__.'/parts/__html_navbar.php' ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- 區塊註解 -->
                <?php /*
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
                    <?php foreach($rows as $r): ?>
                    <tr>
                        <td><?= $r['sid'] ?></td>
                        <td><?= $r['name'] ?></td>
                        <td><?= $r['email'] ?></td>
                        <td><?= $r['mobile'] ?></td>
                        <td><?= $r['birthday'] ?></td>
                        <td><?= $r['address'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            */ ?>

            </div>
        </div>
    </div>
<?php include __DIR__.'/parts/__scripts.php' ?>
    <!-- php生出javascript -->
    <script>
    const rows = <?=json_encode($rows) ?>;

    </script>
<?php include __DIR__.'/parts/__html_foot.php' ?>

