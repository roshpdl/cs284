<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Output Page</title>
</head>
<body>
    <div>
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                padding: 5px;
            }
        </style>
    </div>
    <div>
        <?php
        require_once "../connect.php";
        require_once "../get_sql_data.php";

        //assigning variables using input validation
        $valid_brand = array("%", "Bud Light", "Budweiser", "Coca-Cola", "Doritos", "E-Trade", "Hynudai", "Kia", "NFL", "Pepsi", "Toyota");
        $valid_year = range(2000, 2021);
        $valid_check = "on";

        $brand = in_array($_POST['brand'], $valid_brand) ? $_POST['brand'] : exit("Invalid brand");
        $yearstart = in_array($_POST['yearstart'], $valid_year) ? (int) $_POST['yearstart'] : exit("Invalid year");
        $yearend = in_array($_POST['yearend'], $valid_year) ? (int) $_POST['yearend'] : exit("Invalid year");
        $checks = array($_POST['check1'], $_POST['check2'], $_POST['check3'], $_POST['check4'], $_POST['check5'], $_POST['check6']);

        foreach($checks as $check){
            //If the check is not empty and not "on", that means something is sus, terminate the program. **Checks are either "on" or empty.**
            if($check != $valid_check && $check != ""){
                exit("Something went wrong");
            }
        }

        //from previous page
        $colm_names = array("funny", "product", "patriotic", "celebrity", "danger", "animals");

        //first query
        $q = "select year, brand, url from super_bowl_ads where brand like ?";
        $i = 0;
        foreach ($checks as $check){
            if($check == $valid_check){
                $q .= " and $colm_names[$i] = 1";
            }
            $i++;
        }
        $q .= " and year > ? and year < ? order by year asc";

        $allData = get_sql_data($pdo, $q, array($brand, $yearstart, $yearend));

        if ($allData == null) {
            echo "<p>No ads match your request.</p>";
        }else {
        //displaying results
        echo "<table>\n"
            ."<tr>\n"
            ."<th>Year</th>\n"
            ."<th>Brand</th>\n"
            ."<th>URL</th>\n"
            ."</tr>\n";
        foreach($allData as $rows){
            echo "<tr>\n"
                ."<td>$rows[year]</td>\n"
                ."<td>$rows[brand]</td>\n"
                ."<td><a href=\"$rows[url]\">Watch Here</a></td>\n"
                ."</tr>\n";
        }
        echo "</table>\n";
        echo "<p>Ad information provided by <a href=\"https://fivethirtyeight.com\">Fivethirtyeight.com</a></p>\n";
        }
        ?>
    </div>
</body>
</html>
