<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php
            $row = (int) $_GET['row'];
            $col = (int) $_GET['col'];
            if ($row <= 10 && $row > 0 && $col <= 10 && $col > 0){
                echo "<p>You selected row $row and column $col</p>";
            }else {
                print "<p> Illegal input. Error reported!</p>";
                print "</div>\n</body>\n</html>";
                exit();
            }
        ?>
    </div>
</body>
</html>