<?php

require_once 'dbconnect.php';
require_once 'fetch_from_mysql.php';

// validating user input
$date = $_POST['date'] ?? '%';
$season = $_POST['season'] ?? '%';
$team = $_POST['team'] ?? '%';
$referee = $_POST['referee'] ?? '%';
$win_loss_draw = $_POST['win_loss_draw'] ?? '%';

// creating query
$q = "SELECT 
      md.id, 
      md.Season, 
      md.Date, 
      rd.RefereeName, 
      ht.ClubName AS HomeTeamName, 
      at.ClubName AS AwayTeamName, 
      md.Fulltime, 
      md.Halftime, 
      md.HomeGoals, 
      md.HomeGoalsHalftime, 
      md.HomeShots, 
      md.HomeShotsOnTarget, 
      md.HomeCorners, 
      md.HomeFouls, 
      md.HomeYellowCards, 
      md.HomeRedCards, 
      md.AwayGoals, 
      md.AwayGoalsHalftime, 
      md.AwayShots, 
      md.AwayShotsOnTarget, 
      md.AwayCorners, 
      md.AwayFouls, 
      md.AwayYellowCards, 
      md.AwayRedCards
      FROM 
      epl_matches as md 
      JOIN referees as rd ON md.Referee = rd.RefereeID 
      JOIN clubs as ht ON md.HomeTeam = ht.ClubID 
      JOIN clubs as at ON md.AwayTeam = at.ClubID
      WHERE md.Season LIKE ? AND rd.RefereeName LIKE ? AND md.Date LIKE ? AND (ht.ClubName LIKE ? OR at.ClubName LIKE ?) AND md.FullTime LIKE ?
      Order by md.id";
    
    $params = array($season, $referee, ($date ? $date : '%'), $team, $team, $win_loss_draw);
    $data = get_data($pdo, $q, $params);

//outputting data
$html = "";
if(empty($data)){
  $html .= "<tr><td colspan='21' style='text-align:center; padding:30px;'>No data available</td></tr>";
} else {
  foreach($data as $row) {
    $html .= "<tr>";
    $html .= "<td>" . $row['Season'] . "</td>";
    $html .= "<td>" . $row['Date'] . "</td>";
    $html .= "<td>" . $row['RefereeName'] . "</td>";
    $html .= "<td>" . $row['HomeTeamName'] . "</td>";
    $html .= "<td>" . $row['AwayTeamName'] . "</td>";
    $html .= "<td>" . $row['Fulltime'] . "</td>";
    $html .= "<td>" . $row['Halftime'] . "</td>";
    $html .= "<td>" . $row['HomeGoals'] . "</td>";
    $html .= "<td>" . $row['HomeGoalsHalftime'] . "</td>";
    $html .= "<td>" . $row['HomeShots'] . "</td>";
    $html .= "<td>" . $row['HomeShotsOnTarget'] . "</td>";
    $html .= "<td>" . $row['HomeCorners'] . "</td>";
    $html .= "<td>" . $row['HomeFouls'] . "</td>";
    $html .= "<td>" . $row['HomeYellowCards'] . "</td>";
    $html .= "<td>" . $row['HomeRedCards'] . "</td>";
    $html .= "<td>" . $row['AwayGoals'] . "</td>";
    $html .= "<td>" . $row['AwayGoalsHalftime'] . "</td>";
    $html .= "<td>" . $row['AwayShots'] . "</td>";
    $html .= "<td>" . $row['AwayShotsOnTarget'] . "</td>";
    $html .= "<td>" . $row['AwayCorners'] . "</td>";
    $html .= "<td>" . $row['AwayFouls'] . "</td>";
    $html .= "<td>" . $row['AwayYellowCards'] . "</td>";
    $html .= "<td>" . $row['AwayRedCards'] . "</td>";
    $html .= "</tr>";
  }
}
echo $html;
