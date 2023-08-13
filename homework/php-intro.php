<!DOCTYPE html>

<html lang="en">

<head>
    <title>Jan 30 Homework</title>
    <link rel="stylesheet" href="../css/cs284/jan30.css">
</head>

<body>
    <div>
        <table id="first-table">
            <tr>
                <th></th>
                <th>Col 1</th>
                <th>Col 2</th>
            </tr>
            <tr>
                <td>Row 1</td>
                <td>1</td>
                <td>2</td>
            </tr> 
            <tr>
                <td>Row 2</td>
                <td>1</td>
                <td>2</td>
            </tr>
        </table>
    </div>
    
    <div>
        <?php
        $sites = array('https://www.youtube.com', 'https://www.netflix.com', 'https://tabs.ultimate-guitar.com', 'https://openai.com', 'https://pixlr.com');
        $descp = array("It's pretty much self-explanatory", "To watch cool series", "To look at the tabs to play old Nepali songs on my guitar", "Oh! ChatGPT", "Free photo editing tool that doesn't take 10 minutes to install and does not charge $30 per month subscription");
        $html = "<ul>\n";
        $length = count($sites);
        for ($i=0; $i < $length; $i++ ){
            $html .= "\t\t\t<li><a href='$sites[$i]'>" . substr($sites[$i], 8, strlen($sites[$i])) . "</a><p>$descp[$i]</p></li>\n";
        }
        $html .= "\t\t</ul>";
        print $html;
        ?>

        <table>
            <?php
            $num = 0;
            for ($row=1; $row<51; $row++) {
                print "<tr>";
                for ($col=1; $col<11; $col++) {
                    $num = $col + ($row - 1) * 10;
                    print "<td>$num</td>";
                }
                print "</tr>";
            }
            // while ($num < 500){
            //     print "<tr>";
            //     for ($i = 1; $i < 11; $i++){
            //         $num++;
            //         print "<td>$num</td>";
            //     }
            //     print "</tr>";
            // }
            ?>
        </table>  
    </div>
</body>

</html>