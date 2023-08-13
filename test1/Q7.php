<!DOCTYPE html>

<html lang="en">
<head>
    <title>Q7 Test 1</title>
</head>
<body>
    <div>
    <?php
    include "fileheader.php";
    ?>
    </div>
    <?php
    include 'fakecsdata.php';
    ?>
    <div>
        <form action="Q7-output.php" method="post">
        Please select a student: 
        <select name="students">
        <?php
        foreach(array_keys($students) as $student){
            $student_names_dict = $students[$student];
            $first_name = $student_names_dict['firstname'];
            $last_name = $student_names_dict['lastname'];
            print "<option value=\"$student\">$first_name $last_name</option>\n";
        }
        ?>
        </select>
        <p><input type="submit" value="Submit"></p>
        </form>
    </div>
    
</body>
</html>