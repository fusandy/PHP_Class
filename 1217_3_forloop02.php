<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>for loop02</title>
</head>

<body>
    <!-- 九九乘法 -->
    <table border="1">
        <?php for($i=1; $i<10; $i++): ?>
        <tr>
            <td>
                <?php for($k=1; $k<10; $k++): ?>
            </td>
            <td>
                <?php printf('%s*%s=%s', $i,$k,$i*$k) ?>
                <?php endfor; ?>
            </td>
        </tr>
        <?php endfor; ?>
    </table>

</body>
</html>