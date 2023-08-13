<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 8</title>
</head>
<body>
    <div>
    <?php
    include "fileheader.php";
    ?>
    </div>
    <style>
        table {
            margin: 10px;
            border-collapse: collapse;
        }

        tr {
            border: 1px solid gray;
            text-align: center;
        }

        tr:nth-child(1), tr td:nth-child(1) {
            background-color: navy;
            color: white;
        }

        td {
            padding: 20px;
        }

    </style>
    <div>
        <table class="q8">
            <?php
            echo "<tr>\n<td></td>\n";
            for($i=1; $i<=10; $i++){
                echo "<td>$i</td>\n";
            }
            echo "</tr>\n";
            for($i = 1; $i <= 10; $i++){
                echo "<tr><td>$i</td>\n";
                for($j = 1; $j <= 10; $j++){
                    echo "<td><a href=\"Q8-output.php?row=$i&col=$j\">click me</a></td>\n";
                }
                echo "</tr>\n";
            }
            ?>
        </table>
    </div>
</body>
</html>