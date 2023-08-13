<!DOCTYPE html>

<html lang=en>
    <head>
        <title>Feb 6 in class</title>
    </head>
    <body>
        <div>
            <?php
            // $myarray = array(17, 19, 'hello', 'goodbye');
            // print_r($myarray);
            // print "<p>$myarray[3]</p>\n"; 
            // print "<p>" . $myarray[3] . "</p>\n"; //same thing as previous line
            // print "<p>\"$myarray[3]\"</p>\n";
            // print "<p>{$myarray[3]}</p>\n";

            // foreach ($myarray as $thing) {
            //     print "<p>{$thing}</p>\n";
            // }

            // for ($i = 0; $i < count($myarray); $i++){
            //     print "<p>{$myarray[$i]}</p>\n";
            // }

            // Multidimensional array
            // $arr2D = array(
            //     array(1,2,3),
            //     array(10, 20, 30)
            //     );
            // print "<p>{$arr2D[1][2]}</p>\n";
            
            // $my_assoc_arr = array(
            //     'alan' => 'espinoza',
            //     'roshan' => 'poudel',
            //     'drew' => 'miller',
            // );
            // print "<p>{$my_assoc_arr['drew']}</p>\n";
            // print_r($my_assoc_arr);

            // $keys = array_keys($my_assoc_arr);
            // print_r($keys);

            // foreach ($keys as $firstName){
            //     $lastName = $my_assoc_arr[$firstName];
            //     print "<p>$lastName</p>\n";
            // }
            ?>
        </div>
        <div>
            <form action="feb6-output.php" method="post">
                <p><input id="check1" type="checkbox" name="php">Check if you like PHP</p>
                <p><input id="check1" type="checkbox" name="python">Check if you like Python</p>
                <p><input type="submit" value="SUBMIT"></p>

            </form>
        </div>
    
    </body>
</html>