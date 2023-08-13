<!DOCTYPE html>

<html lang=en>
    <head>
        <title>Feb3 in class output</title>
    </head>
    <body>
        <style>
            table {
                border-collapse: collapse;
                margin: 20px;
                font-size: x-large;
            }

            tr {
                border: thin solid black;
            }

            td {
                padding: 10px;
                padding-left: 20px; 
            }

            tr:nth-child(1) {
                background-color: navy;
                color: white;
            }

            tr td:nth-child(1){
                padding-left: 10px;
                background-color: navy;
                color: white;
            }
        </style>
        <div>
            <table>
            <?php
            $numb = (int) $_GET['num'];
            print "Here is the multiplication table for numbers upto $numb * $numb\n";
            print "<tr><td></td>";
            for ($i = 1; $i <= $numb; $i++) {
              print "<td>$i</td>";
            }
            print "</tr>";
            
            for ($i = 1; $i <= $numb; $i++) {
              print "<tr><td>$i</td>";
              for ($j = 1; $j <= $numb; $j++) {
                $prod = $i * $j;
                print "<td>$prod</td>";
              }
              print"</tr>";
            }
            print"</table>";
            ?>
            </table>
        </div>
    </body>
</html>