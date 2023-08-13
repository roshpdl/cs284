<!DOCTYPE html>

<html lang="en">
<head>
    <title>Cute Animals Output</title>
</head>
<body>
    <div>
        <?php
        $links_arr = array( "dog" => "dog.jpg",
                            "cat" => "cat.jpg",
                            "squirrel" => "squirrel.jpg",
                            "penguin" => "penguin.jpg",
                            "rabbit" => "bunny.jpg",
                            "owl" => "owl.jpg" );
        $selected_animal = $_POST['animals'];
        if (!in_array($selected_animal, array_keys($links_arr))){
            print "</div></body></html>";
            exit();
        }
        print "<img src=\"../images/cs284/$links_arr[$selected_animal]\">\n";
        ?>

    </div>
</body>
</html>