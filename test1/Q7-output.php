<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q7 Output</title>
    <link rel="stylesheet" href="test1.css">
</head>
<body>
    <div>
        <style>
        <?php
            print <<<TABLE_DATA_STYLE
            #special {
                background-color: lightblue;
            }
            TABLE_DATA_STYLE;
            ?>
        </style>
    </div>

    <div>
        <?php
        include "fakecsdata.php";

        $student_num = $_POST['students'];
        if (!in_array($student_num, array_keys($students)) || !is_string($student_num)){
            exit_nicely("Invalid input");
        }

        foreach($classes as $class=>$student){
            if (in_array($student_num, $student['students'])){
                $title = $student['title'];
                $name = returnStudentName($student_num, $students);
                print "<p>$name is in class $title. Here is the roster:</p>";
                print "<table>\n";
                foreach($student['students'] as $stu_code){
                    $naam = returnStudentName($stu_code, $students);
                    if ($naam == $name){
                    //highlight the name
                    print "<tr><td id=\"special\">$naam</td></tr>\n";
                    }else{
                    print "<tr><td>$naam</td></tr>\n";
                    }
                }
                print "</table>";
                break;
            }
            }
        ?>
    </div>
    
</body>
</html>

<?php
function exit_nicely($error_message) {
    print <<<END_OF_STUFF
    <p>$error_message</p>
    </div>
    </body>
    </html>
    END_OF_STUFF;
    exit();
}

//this function returns the student's name given the code
function returnStudentName($stu_code, $assoc_arr){
    $student_name = $assoc_arr[$stu_code];
    $first_name = $student_name['firstname'];
    $last_name = $student_name['lastname'];
    return $first_name . " " . $last_name;
}
?>