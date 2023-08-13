<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sports Review Page</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <link rel="stylesheet" href="main.css">
  <!-- <script>
    $(document).ready(function() {
      $('#filter-button').click(function() {
        // Get the values of the form inputs
        var season = $('#season-filter').val();
        var team = $('#team-filter').val();
        var referee = $('#referee-filter').val();
        var date = $('#date-filter').val();

        // Make an AJAX request to the server with the form data
        $.ajax({
          type: 'POST',
          url: 'matches.php',
          data: {
            season: season,
            team: team,
            referee: referee,
            date: date
          },
          success: function(data) {
            // Replace the table body with the new data
            $('#match-table tbody').html(data);
          }
        });
      });
    });
  </script> -->
  <!-- <script>
    $(document).ready(function() {
      $('#filter-button').click(function() {
        let vars = $('#filter-form').serialize();
        let url = 'matches.php?' + vars;
        console.log(url);
        $.get(url, {}, function(d) {
          $('tbody').html(d);
        });
    });
  });
  </script> -->

</head>

<?php
//contains the valid seasons, teams, and referees, and dates
require_once 'valid_data.php';
?>

<body>
  <div id="overlay">
    <div class="spinner"></div>
  </div>
  <h1><img src="../ASSETS/IMAGES/logo.jpg" alt=""></h1>
  <h2>Match Statistics</h2>


  <div id="form">
    <form id="filter-form" method="post">
      <label for="season-filter">Season:</label>
      <select id="season-filter" name="season">
        <?php
        echo "<option value='%'>All</option>";
        foreach (array_slice($valid_seasons, 1) as $season) { // $valid_seasons is defined in valid_data.php
          echo "<option value='" . $season . "'>" . $season . "</option>";
        }
        ?>
      </select><br>

      <label for="team-filter">Team:</label>
      <select id="team-filter" name="team">
        <?php
        echo "<option value='%'>All</option>";
        foreach (array_slice($valid_teams, 1) as $team) { // $valid_teams is defined in valid_data.php
          echo "<option value='" . $team . "'>" . $team . "</option>";
        }
        ?>
      </select><br>

      <label for="referee-filter">Referee:</label>
      <select id="referee-filter" name="referee">
        <?php
        echo "<option value='%'>All</option>";
        foreach (array_slice($valid_referees, 1) as $referee) { // $valid_referees is defined in valid_data.php
          echo "<option value='" . $referee . "'>" . $referee . "</option>";
        }
        ?>
      </select><br>

      <?php
      // Find the earliest and latest available dates
      $min_date = $valid_dates[0]; // $valid_dates is defined in valid_data.php
      $max_date = $valid_dates[count($valid_dates) - 1];

      // Format the dates for the input element
      $min_date_formatted = date('Y-m-d', strtotime($min_date));
      $max_date_formatted = date('Y-m-d', strtotime($max_date));

      // Create the HTML for the date input with the dynamic min and max attributes
      $html = '<label for="date-filter">Date:</label>';
      $html .= '<input type="date" id="date-filter" name="date" min="' . $min_date_formatted . '" max="' . $max_date_formatted . '">';
      echo $html;
      ?><br>

      <div id="radio">
      <input type="radio" id="homewin" name="win_loss_draw" value="HomeWin">
      <label for="homewin" class="radio">Home Win</label>

      <input type="radio" id="awaywin" name="win_loss_draw" value="AwayWin">
      <label for="awaywin" class="radio">Away Win</label>

      <input type="radio" id="draw" name="win_loss_draw" value="Draw">
      <label for="draw" class="radio">Draw</label>

      <button type="button" id="filter-button">Filter</button>
      <button type="reset" id="reset-button">Reset</button>
      </div>

      <button type="button" id="export-button">Want More Insights ?</button>

    </form>
  </div>

  <div id="table">
    <table id="match-table">
      <thead>
        <tr>
          <th>Season</th>
          <th>Date</th>
          <th>Referee</th>
          <th>Home Team</th>
          <th>Away Team</th>
          <th>Full Time</th>
          <th>Half Time</th>
          <th>Home Goals</th>
          <th>Home Goals Halftime</th>
          <th>Home Shots</th>
          <th>Home Shots On Target</th>
          <th>Home Corners</th>
          <th>Home Fouls</th>
          <th>Home Yellow Cards</th>
          <th>Home Red Cards</th>
          <th>Away Goals</th>
          <th>Away Goals Halftime</th>
          <th>Away Shots</th>
          <th>Away Shots On Target</th>
          <th>Away Corners</th>
          <th>Away Fouls</th>
          <th>Away Yellow Cards</th>
          <th>Away Red Cards</th>
        </tr>
        </tr>
      </thead>
      <tbody>
        <?php include 'matches.php'; ?>
      </tbody>
    </table>
  </div>
</body>

<script>
  // Start the spinner animation when the page starts loading
  $(window).on('load', function() {
    $('#overlay').fadeIn(200);
    $('.spinner').show();
  });

  // Stop the spinner animation when the content has finished loading
  $(window).on('load', function() {
    $('#overlay').fadeOut(200);
    $('.spinner').hide();
  });
</script>

<script>
  $(document).ready(function() {
    $('#filter-button').click(function() {
      // Get the values of the form inputs
      var season = $('#season-filter').val();
      var team = $('#team-filter').val();
      var referee = $('#referee-filter').val();
      var date = $('#date-filter').val();
      var win_loss_draw = $('input[name="win_loss_draw"]:checked').val();

      // Make an AJAX request to the server with the form data
      $.ajax({
        type: 'POST',
        url: 'matches.php',
        data: {
          season: season,
          team: team,
          referee: referee,
          date: date,
          win_loss_draw: win_loss_draw
        },
        success: function(data) {
          // Replace the table body with the new data
          $('#match-table tbody').html(data);
        }
      });
    });

    $('#export-button').click(function() {
      window.location.href = 'robust_query.php';
    });
  });
</script>

</html>