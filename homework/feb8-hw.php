<!DOCTYPE html>

<html lang="en">
<head>
    <title>FEB 8 HW</title>
</head>
<body>
    <div>
        <form action="feb8HW-output.php" method="post">
        <select name="Int1">
            <option value="blank">Pick an integer</option>
            <?php
            for ($i=1; $i<101; $i++){
                print "<option value = \"{$i}\">{$i}</option>\n";
            }
            ?>
        </select>
        <select name="operator">
            <option value="blank">Pick an operator</option>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="%">%</option>
        </select>
        <select name="Int2">
            <option value="blank">Pick another integer</option>
            <?php
            for ($i=1; $i<101; $i++){
                print "<option value = \"{$i}\">{$i}</option>\n";
            }
            ?>
        </select>

        <p><input type="submit" value="Do it!" name="submit1"></input></p>

        <?php
        for($i=0; $i<21; $i++){
            if ($i % 3 == 0) {
                print "<input type=\"checkbox\" value=\"{$i}\" name=\"checked[]\" checked>{$i}</input><br>";
            }else{
                print "<input type=\"checkbox\" value=\"{$i}\" name=\"checked[]\">{$i}</input><br>";
            }
        }
        ?>
        <p><input type="submit" value="Do it Again!" name="submit2" ></input></p>
        </form>
    </div>
</body>
</html>