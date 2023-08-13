<!DOCTYPE html>

<html lang=en>

    <head>
        <title>Feb 1 output page</title>
    </head>

    <body>
        
        <div>
            
            <?php
            $users_number = (int) $_POST['mynumber'];
            $num2 = (int) $_POST['mynumber2'];

            if ($users_number <= 0 || $num2 <= 0){
                print("Are you sure you entered both positive numbers?");
                print("</div></body></html>");
                exit();
            }

            print("This is the output page. Your number is $users_number.
             Your other number is $num2.");
            ?>

        </div>

    </body>

</html>