<!DOCTYPE html>

<html lang=en>
    <head>
        <title>Feb1-HW-Output2</title>
    </head>
    <body>
        <div>
            <?php
                $row = (int) $_GET['rows'];
                $col = (int) $_GET['columns'];
                print "<style>";
                print "td {outline: thin solid black; padding: 10px;}";
                print "</style>";
                print "<table>";
                for ($i=0; $i < $row; $i++){
                    print "<tr>";
                    for ($j = 0; $j < $col; $j++){
                        print "<td>X</td>";
                    }
                    print "</tr>";
                }
                print "</table>";
            ?>
        </div>
    </body>
</html>