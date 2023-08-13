<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test 1 Index</title>
</head>
<body>
    <h1>Roshan Poudel</h1>
    <h2>Links to the Questions in Test 1:</h2>
    <div>
        <?php
        $links_array = array('Question 4' =>'table.php',
                            'Question 5' =>'cuteanimals_input.php',
                            'Question 6' => 'fakecs.php',
                            'Question 7' => 'Q7.php',
                            'Question 8' => 'Q8_table.php',
                            'Question 9' => 'feb10-exercise.php',
                            );
        foreach($links_array as $question=>$link){
            print <<<LIST
            <ul>
            <li><a href="$link">$question</a></li>
            </ul>
            LIST;
        }
        ?>
    </div>
</body>
</html>