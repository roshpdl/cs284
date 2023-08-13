<!DOCTYPE html>

<html lang="en">
<head>
    <title>Q5. Cute Animals</title>
</head>
<body>
    <div>
    <?php
    include "fileheader.php";
    ?>
    </div>
    <style>
        select {
            text-transform: capitalize;
        }
    </style>
    <div>
        <form action="cuteanimals_output.php" method="post">
        Select an animal: 
        <?php
        echo "<select name=\"animals\">\n";
        $valid_animals = array("dog", "cat", "squirrel", "penguin", "rabbit", "owl");
        foreach($valid_animals as $animal){
            echo "<option value=\"$animal\">$animal</option>\n";
        }
        echo "</select>";
        ?>
        <p><input type="submit" value="Submit"></p>
        </form>
    </div>   
</body>
</html>