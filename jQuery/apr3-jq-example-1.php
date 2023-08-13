<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>First jquery exploration</title>
    <style>
    div {
        border: 1px solid black;
        margin: 5px;
        padding: 10px;
    }

    #second {
        background-color: lightblue;
    }
    </style>

    <script>
    $(document).ready(function(){
        let h = $('#third').height(200);
        let w= $('#third').width();
        let x = $('#second').html();
        console.log(x);
        let y = "<p>hello</p>" + x;
        $('#first').html(y);

        $('#first').css("border", "5px dotted blue");

        $('#third').remove()

        $('#clicker1').click(function(){
            $('#first').html("<p>You clicked the button!</p>");
        });

        $('#clicker2').click(function(){
            $('#second').fadeToggle(1000); // 1000 is the time in milliseconds
        });
    });
    </script>

</head>

<body>
    <input type="button" value="1" id="clicker1">
    <input type="button" value="2" id="clicker2">

    <div id="first">
    <p>first thing</p>
    </div>

    <div id="second">
    <p>second thing</p>
    </div>

    <div id="third">
    <p>third thing</p>
    </div>

</body>

<!-- <script>
let h = $('#third').height(200);
let w= $('#third').width();
console.log(h);
console.log(w);
</script> -->

</html>