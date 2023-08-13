<!DOCTYPE html>

<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <div>
    <?php
    include "fileheader.php";
    ?>
    </div>
    <style>
        form {
            text-transform: capitalize;
        }
    </style>
    <div>
        <form action="feb10-exoutput1.php" method = "post">
            <p>Please select exactly colors:</p>
            <?php
            $array_of_colors = array('green', 'red', 'blue', 'yellow', 'gray', 'black', 'white', 'orange', 'pink');
            foreach($array_of_colors as $color){
                print "<input type=\"checkbox\" name=\"color[]\" value=\"$color\">$color<br>";
            }
            ?>
            <div style="margin-top:10px;">Please select a number:
            <select name="ints">
                <?php
                for ($i = 0; $i < 101; $i++){
                    print "<option value=\"$i\">$i</option>";
                }
                ?>
            </select>
            </div>
            <p><input type="submit" value="Submit"></p>
        </form>
    </div>
</body>
</html>