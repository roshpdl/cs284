<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>March22HW_Roshan</title>
</head>
<body>
    <form action="output.php" method="post">
    <?php
        require_once "../connect.php";
        $q = 'select Code, Name from world_x_country order by Name';
        $query = $pdo->prepare($q);
        $query->execute();
        $allrows = $query->fetchAll();
        echo "<p>Please select a country: ".
             "<select name=\"country\"></p>";
        foreach ($allrows as $row) {
            echo "<option value=\"$row[Code]\">$row[Name]</option>\n";
        }
        echo "</select>".
             "<p><input type=\"checkbox\" name=\"check\"> Include only official languages?</p>".
             "<p><input type=\"submit\" value=\"Submit\"></p>";
    ?>
    </form>
</body>
</html>