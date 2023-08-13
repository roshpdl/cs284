<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Q3 Test2</title>
    <script>
        $(document).ready(function(){
            $('#reset').click(function(){
                $('input[type="checkbox"]').prop('checked', false);
                $('select[name="brand"]').prop('value', '%');
                $('select[name="yearstart"]').prop('value', '2000');
                $('select[name="yearend"]').prop('value', '2020');
                // A one liner that selects the first option (i.e default) from all select statements
                //$('select').prop('selectedIndex', 0);
            });
        });
    </script>

</head>
<body>
    <div>
        <form action="output.php" method="post">
            <?php
            require_once "../connect.php";
            require_once "../get_sql_data.php";

            //first query
            $q1 = "select distinct brand from super_bowl_ads order by brand asc";
            $allRows = get_sql_data($pdo, $q1);


            echo "<div>"
                ."<select name=\"brand\">\n"
                . "<option value=\"%\">All</option>\n";
            foreach($allRows as $rows){
                echo "<option value=\"$rows[brand]\">$rows[brand]</option>\n";
            }
            echo "</select>\n"
                ."</div>\n";
            
            //second query
            $q2 = "select distinct year from super_bowl_ads order by year";
            $allRows = get_sql_data($pdo, $q2);

            echo "<div>\n</p>Year between "
                ."<select name=\"yearstart\">\n";
            print_years($allRows);
            echo "</select>\n";

            echo " and "
                ."<select name=\"yearend\">\n";
            print_years($allRows, $reverse=true);
            echo "</select></p>\n</div>\n";

            //third query
            $q3 = "SELECT column_name FROM information_schema.columns WHERE table_name = ? AND ordinal_position  BETWEEN ? AND ?";
            $allRows = get_sql_data($pdo, $q3, array('super_bowl_ads', 4, 9));
            $colm_names = array();
            foreach($allRows as $rows){
                $colm_names[] = $rows['column_name'];
            }
            // print_r($colm_names);
            echo "<div>"
                ."<input type=\"checkbox\" name=\"check1\"> AD is $colm_names[0]<br>"
                ."<input type=\"checkbox\" name=\"check2\"> AD shows $colm_names[1]<br>"
                ."<input type=\"checkbox\" name=\"check3\"> AD is $colm_names[2]<br>"
                ."<input type=\"checkbox\" name=\"check4\"> AD features $colm_names[3]<br>"
                ."<input type=\"checkbox\" name=\"check5\"> AD includes $colm_names[4]<br>"
                ."<input type=\"checkbox\" name=\"check6\"> AD features $colm_names[5]<br>"
                . "</div>\n";

            echo "<p><input type=\"submit\" value=\"Submit\"></p>";
            echo "<p><input type=\"button\" id=\"reset\" value=\"Reset Form\"></p>";
            ?>
        </form>
    </div>
</body>
</html>
 
<?php
    function print_years($allRows, $reverse=false){
        if($reverse){
            $allRows = array_reverse($allRows);
        }
        foreach ($allRows as $rows){
            echo "<option value=\"$rows[year]\">$rows[year]</option>\n";
        }
    }
?>