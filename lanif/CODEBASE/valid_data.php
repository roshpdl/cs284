<?php

require_once 'dbconnect.php';
require_once 'fetch_from_mysql.php';

//declaring valid variables

$valid_seasons = array("%");
$valid_teams = array("%");
$valid_referees = array("%");
$valid_dates = array();

$q = "SELECT DISTINCT Season FROM epl_matches ORDER BY Season ASC";
$seasons = get_data($pdo, $q);
foreach ($seasons as $season) {
  array_push($valid_seasons, $season['Season']);
}

$q = "SELECT DISTINCT ClubName FROM clubs ORDER BY ClubName ASC";
$teams = get_data($pdo, $q);
foreach ($teams as $team) {
  array_push($valid_teams, $team['ClubName']);
}

$q = "SELECT RefereeName FROM referees ORDER BY RefereeName ASC";
$referees = get_data($pdo, $q);
foreach ($referees as $referee) {
  array_push($valid_referees, $referee['RefereeName']);
}

$q = 'SELECT DISTINCT Date from epl_matches ORDER BY Date ASC';
$dates = get_data($pdo, $q);
foreach ($dates as $date) {
  array_push($valid_dates, $date['Date']);
}

?>