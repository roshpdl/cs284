<!DOCTYPE html>

<html lang="en">
<head>
    <title>Q4. Table</title>
    <link rel="stylesheet" href="test1.css">
</head>
<body>
    <div>
    <?php
    include "fileheader.php";
    ?>
    </div>
    <div>
        <?php
        echo "<table>\n";
        $rows = 100;
        $columns = 5;
        for ($i = 1; $i <= $rows; $i++){
            echo "<tr>\n";
            for ($j = 1; $j <= $columns; $j++){
                if ($i % 5 == 0){
                    echo "<td class=\"q4\">o</td>\n";
                }else{
                    echo "<td class=\"q4\">x</td>\n";
                }
            }
            echo "</tr>\n";
        }
        echo "</table>\n";
        ?>
    </div>
</body>
</html>