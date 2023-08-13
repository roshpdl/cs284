<html lang="en">
<head>
    <title>Feb 10 output</title>
</head>
<body>
    <div>
        <?php
        include "animalinclude.php";
        $legal_animals = array('cat', 'dog', 'bird', 'rabbit');
        $animal = $_POST['fav_animal'];

        if (!in_array($animal, $legal_animals)){
            exit_nicely("Please enter a legal animal");
        }
        print "<p>$animal</p>";

        $h = $_POST['hiddenn'];
        print "<p>$h</p>";
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

?>