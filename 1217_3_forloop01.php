<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>for loop01</title>
</head>
<body>
    
    <table>
        <tr>
            <?php for($i=0; $i<10; $i++): ?>
            <td>
                <?= $i ?>
            </td>
            <?php endfor; ?>
        </tr>
    </table>

</body>
</html>