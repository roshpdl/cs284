<!DOCTYPE html>

<html lang=en>
    <head>
        <title>Feb3 in class final output</title>
    </head>
    <body>
        <style>
            table {
                border-collapse: collapse;
                border: 2px solid black;
                background-color: aliceblue;
            }

            tr {
                border: 1px solid lightgray;
            }

            td {
                padding: 10px;
            }

            <?php
            $rtoh = (int) $_POST['rowToHighlight'];
            $ctoh = (int) $_POST['colToHighlight'];
            print "tr:nth-child(" . $rtoh . "){background-color: navy; color: white;}";
            print "tr td:nth-child(" . $ctoh . "){background-color: navy; color: white;}";
            ?>

        </style>
        <div>
            <?php
            $row = (int) $_POST['row'];
            $col = (int) $_POST['col'];
            $rtoh = (int) $_POST['rowToHighlight'];
            $ctoh = (int) $_POST['colToHighlight'];
            if ($row >= 5 && $row <= 100 && $col >=3 && $col <= 10) {
                if ($rtoh >= 5 && $rtoh <= 100 && $ctoh >= 3 && $ctoh <= 10) {
                    print "<p>Here is the $row x $col table with row $rtoh and column $ctoh highlighted:</p> \n";
                    print "<table>\n";
                    for ($i = 0; $i < $row; $i++) {
                        print "<tr>\n";
                        for ($j = 0; $j < $col; $j++) {
                            print "<td>X</td>\n";
                        }
                        print "</tr>\n";
                    }
                    print "</table>\n";
                }else {
                    print "<p>Please make sure that the column and row number that you selected to highlight is present in the table</p>\n";
                }
            } else {
                print "<p>Please enter a valid range of columns and rows</p>";
            }
            ?>
        </div>
    </body>
</html>