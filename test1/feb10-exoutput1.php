 <!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>feb10 Output 1</title>
</head>
<body>
    <div>
        <?php
        $colors = $_POST['color'];
        $number_selected = (int) $_POST['ints'];
        if (count($colors) != 3 || $number_selected < 0 || $number_selected > 100){
            print "<p>Please select exactly 3 colors</p>\n";
            print "</div>\n</body></html>";
            exit();
        }?>
        <form action="feb10-exoutput2.php" method="post">
        <?php
        foreach($colors as $color){
            print "<input type=\"radio\" name=\"color\" value=\"$color\">$color<br>";
        }
        print "<input type=\"hidden\" value=\"$number_selected\" name=\"num\">";
        ?>
        <p><input type="submit" value="Make it Happen"></p>
        </form>
    </div>
</body>
</html>