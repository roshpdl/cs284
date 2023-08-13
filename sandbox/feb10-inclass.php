<html lang="en">
<head>
    <title>FEB 10 in class</title>
</head>
<body>
    <div>
        <form action="feb10-output.php" method="post">
        <!-- <input type="radio" name="fav animal">cat<br>
        <input type="radio" name="fav animal">frog<br>
        <input type="radio" name="fav animal">dog<br>
        <input type="radio" name="fav animal">rabbit<br>
        -->
        <?php
        include "animalinclude.php";
        foreach($legal_animals as $animal){
            $adt = $animal_display_text[$animal];
            print "<input type=\"radio\" name=\"fav_animal\" value=\"$animal\">$adt<br>";
        }
        ?>
        <input type="hidden" name="hiddenn" value="I am hidden">
        <p><input type="submit" value="Submit"></p>
        </form>
    </div>
    <div>
        <?php
        $x = do_stuff(7,5);
        print "<p>$x</p>\n";
        ?>
    </div>
</body>
</html>


<?php
function do_stuff($a, $b){
    return ($b - $a);
}
?>