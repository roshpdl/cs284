<!DOCTYPE html>

<html lang=en>
    <head>
        <title>Feb3 in class output</title>
    </head>
    <body>
        <div>
            <?php
            $num1 = (int) $_GET['firstnum'];
            $num2 = (int) $_GET['secondnum'];
            $sum = $num1 + $num2;
            print "<p>$num1 + $num2 = $sum</p>";
            ?>
        </div>
    </body>
</html>