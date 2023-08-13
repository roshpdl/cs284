<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>More Queries</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="new.css">
</head>

<?php
//contains the valid seasons, teams, and referees, and dates
require_once 'valid_data.php';
?>

<body>
    <form id="mainform" method="POST">
        <label for="season">Total Matches Played in a Season:</label>
        <select id="season" name="season">
            <?php
            echo "<option value='%'>All</option>";
            foreach (array_slice($valid_seasons, 1) as $season) { //skip the first element of the array
                echo "<option value='" . $season . "'>" . $season . "</option>";
            }
            ?>
        </select><br>

        <label for="team">Total Matches Played by a Team:</label>
        <select id="team" name="team">
            <?php
            echo "<option value='%'>All</option>";
            foreach (array_slice($valid_teams, 1) as $team) { //skip the first element of the array
                echo "<option value='" . $team . "'>" . $team . "</option>";
            }
            ?>
        </select><br>

        <label for="referee">Total Matches Refereed by a Referee:</label>
        <select id="referee" name="referee">
            <?php
            echo "<option value='%'>All</option>";
            foreach (array_slice($valid_referees, 1) as $referee) { //skip the first element of the array
                echo "<option value='" . $referee . "'>" . $referee . "</option>";
            }
            ?>
        </select><br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <div id="results">
        <?php include 'robust_output.php'; ?>
    </div>
</body>

<script>
    $(document).ready(function() {
        $('#mainform').submit(function(e) {
            e.preventDefault(); // prevent the default form submission

            var mainform = $('#mainform').serialize();

            // Send the form data to the same PHP file
            $.ajax({
                type: 'POST',
                url: 'robust_output.php',
                data: mainform,
                success: function(response) {
                    // Display the results returned by the PHP block
                    $('#results').html(response);
                }
            });
        });
    });
</script>

</html>