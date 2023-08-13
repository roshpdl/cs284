<!DOCTYPE html>

<html lang=en>
    <head>
        <title>Feb1-HW-Output1</title>
    </head>
    <body>
        <div>
            <?php
                $num = (int) $_POST['positivenum'];
                if ($num > 0) {
                    for ($i = 1; $i <= $num; $i++) {
                        print "$i<br>";
                    }
                } else {
                    print "<p>Please enter a valid positive integer.</p>";
                }
            ?>
        </div>
    </body>
</html>