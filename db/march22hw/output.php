<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Output_March22_Roshan</title>
</head>
<body>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
        }
    </style>
    <?php
        require_once "../connect.php";

        // Validate input for country
        if(isset($_POST['country']) && !empty($_POST['country'])){
            $country = $_POST['country'];
        } else {
            echo "<p>Invalid input for country.</p>";
            exit();
        }
        
        // Validate input for check
        if(isset($_POST['check'])){
            $check = $_POST['check'];
            if($check !== 'on'){
                echo "<p>Invalid input for check.</p>";
                exit();
            }
        } else {
            $check = "";
        }

        //Query
        $q = "select Language, IsOfficial, Percentage from world_x_country_language join world_x_country on Code = CountryCode where Code = ?";
        if ($check == "on") {
            $q .= " and IsOfficial = 'T'";
        }
        $q .= " order by Percentage desc";
        $query = $pdo->prepare($q);
        $query->execute([$country]);
        $allrows = $query->fetchAll();

        //Output
        if ($allrows == null) {
            echo "<p>No languages match your request.</p>";
        }else{
        echo "<table>\n";
        echo "<th>Language</th>\n"
            ."<th>IsOfficial</th>\n"
            ."<th>Percentage</th>\n";
        foreach ($allrows as $row) {
            echo "<tr>\n"
                ."<td>$row[Language]</td>\n"
                ."<td>$row[IsOfficial]</td>\n"
                ."<td>$row[Percentage]</td>\n"
                ."</tr>\n";
        }
        echo "</table>\n";
        }
    ?>
</body>
</html>