<!DOCTYPE html>
<html lang="en">
<head>
    <title>FEB 8 HW Output</title>
</head>
<body>
    <div>
        <?php
        //Content-Security-Policy header -->for preventing cross-site scripting.
        header("Content-Security-Policy: default-src 'self'");

        if (isset($_POST["submit1"])) {
            $int1 = (int)$_POST['Int1'];
            $operator = htmlspecialchars($_POST['operator']);
            //The htmlspecialchars() function is used to HTML encode the operator string to prevent XSS.
            $int2 = (int)$_POST['Int2'];
            $validOps = array('+', '-', '*', '%');

            $result = 0;

            if ($int1 > 100 || $int1 < 0 || $int2 > 100 || $int2 < 0 || !in_array($operator, $validOps)) {
                print "<p>Please pick two integers and an operator!</p>";
                print "</div></body></html>";
                exit();
            }
            switch ($operator) {
                case "+":
                    $result = $int1 + $int2;
                    break;
                case "-":
                    $result = $int1 - $int2;
                    break;
                case "*":
                    $result = $int1 * $int2;
                    break;
                case "%":
                    $result = $int1 % $int2;
                    break;
                default:
                    $result = 0;
            }
            print "<p>{$int1} {$operator} {$int2} = {$result}</p>";
        } elseif (isset($_POST["submit2"])) {
            $sum = 0;
            if (!empty($_POST['checked'])) {
                foreach ($_POST['checked'] as $check) {
                    $sum += (int)$check;
                }
                print "<p>The sum of the checked values is: {$sum}</p>";
            }
        }
        ?>
    </div>
</body>
</html>
