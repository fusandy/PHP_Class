<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>for loop03</title>
    <style>
        td {
            width: 40px;
            height: 40px;
        }
    </style>
</head>
<body>
    <!-- 漸層色卡 -->
    <table>
        <tr>
            <?php for($i=0; $i<=255; $i+=17): ?>
            <td style="background-color: #0000<?= sprintf("%'.02X", $i)?>">
            </td>
            <?php endfor; ?>
        </tr>
    </table>
    
</body>
</html>