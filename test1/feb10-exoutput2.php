<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>feb10 Output 2</title>
</head>
<body>
    <div>
    <?php
    $fill_color = $_POST['color'];
    $number = (int) $_POST['num'];
    print <<<PRINT_TABLE
    <table style="padding: 10px; background-color:$fill_color; border: 5px solid black">\n
    <tr><td>$number</td></tr>\n
    </table>
    PRINT_TABLE;
    ?>
    </div>
</body>
</html>