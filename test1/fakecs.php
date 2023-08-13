<!DOCTYPE html>

<html lang="en">
<head>
    <link rel="stylesheet" href="test1.css">
    <title>Q6. Fake CS data</title>
</head>
<body>
    <div>
    <?php
    include "fileheader.php";
    ?>
    </div>

    <h1>List of made-up CS Classes</h1>
    <div>
        <?php
        include "fakecsdata.php";
        echo "<table>\n".
            "<tr>".
            "<th>Class title</th>".
            "<th>Professor</th>".
            "<th>Number of Students</th>".
            "</tr>";

        foreach($classes as $data){
            $title = $data['title'];
            $prof_name_dict= $profs[$data['prof']];
            $prof_name = $prof_name_dict['firstname']. " ". $prof_name_dict['lastname'];
            $num_students = count($data['students']);
            print "<tr><td>$title</td><td>$prof_name</td><td>$num_students</td>";
        }
        echo "</table>";
        ?>
    </div>
</body>
</html>