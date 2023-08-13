<!DOCTYPE html>

<html lang=en>
    <head>
        <title>Feb1 HW</title>
        <link rel="stylesheet" href="../css/cs284/feb1hw.css">
    </head>
    <body>  
        <div class="forms">
            <form id="form1" action="feb1output1.php?" method="post">
                Enter an integer bigger than zero: <input type="text" name="positivenum">
                <p>
                    <input class="sub" type="submit">
                </p>
                <hr>
            </form>
            <form id="form2" action="feb1output2.php?" method="get">
                <label for="r">How many Rows?</label>
                <input id="r" type="text" name="rows">
                <br>
                <label for="c">How many Columns?</label>
                <input id="c" type="text" name="columns">
                <p>
                    <input class="sub" type="submit">
                </p>
            </form>
            
        </div>
    </body>
</html>