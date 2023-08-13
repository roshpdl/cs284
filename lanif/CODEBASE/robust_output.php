<?php
//contains the database connection credentials
require_once 'dbconnect.php';

//contains the function to fetch data from the database
require_once 'fetch_from_mysql.php';

// Error handling function
function display_error($error_message)
{
    echo "<p class='error'>$error_message</p>";
}

// Get the values of the form inputs
$season = $_POST['season'] ?? '%';

// Build the SQL query using the selected season
$query = "SELECT COUNT(*) AS TotalMatches
        FROM epl_matches
        WHERE Season = ?;
        ";

// Fetch the data from the database
$result = get_data($pdo, $query, array($season));

//Display the results
if (empty($result)) {
    echo "<p>No results found.</p>";
} elseif ($result === false) {
    display_error("An error occurred while fetching data from the database.");
} else {
    echo "<p>Total matches played in season " . $season . ": " . $result[0]['TotalMatches'] . "</p>";
}

// Get the values of the form inputs
$team = $_POST['team'] ?? '%';

// Build the SQL query using the selected team
$query = "SELECT COUNT(*) AS TotalMatchesPlayed
    FROM epl_matches
    JOIN clubs c1 ON epl_matches.HomeTeam = c1.ClubID
    JOIN clubs c2 ON epl_matches.AwayTeam = c2.ClubID
    WHERE Season = ? AND (c1.ClubName = ? OR c2.ClubName = ?);
    ";

// Fetch the data from the database
$result = get_data($pdo, $query, array($season, $team, $team));

//Display the results
if (empty($result)) {
    echo "<p>No results found.</p>";
} elseif ($result === false) {
    display_error("An error occurred while fetching data from the database.");
} else {
    echo "<p>Total matches played by " . $team . ": " . $result[0]['TotalMatchesPlayed'] . "</p>";
}

// Build the SQL query using the selected team and season
$query = "SELECT SUM(CASE 
                    WHEN epl_matches.HomeTeam = c.ClubID THEN epl_matches.HomeGoals 
                    ELSE epl_matches.AwayGoals
                END) AS GoalsScored
        FROM epl_matches
        JOIN clubs c ON epl_matches.HomeTeam = c.ClubID OR epl_matches.AwayTeam = c.ClubID
        WHERE Season = ? AND c.ClubName = ?;
        ";

// Fetch the data from the database
$result = get_data($pdo, $query, array($season, $team));

//Display the results
if (empty($result)) {
    echo "<p>No results found.</p>";
} elseif ($result === false) {
    display_error("An error occurred while fetching data from the database.");
} else {
    echo "<p>Total goals scored by " . $team . " in season " . $season . ": " . $result[0]['GoalsScored'] . "</p>";
}

// Get the values of the form inputs
$referee = $_POST['referee'] ?? '%';

// Build the SQL query using the selected referee and season
$query = "SELECT COUNT(*) AS TotalMatchesRefereed
        FROM epl_matches
        JOIN referees r ON epl_matches.Referee = r.RefereeID
        WHERE Season = ? AND r.RefereeName = ?;
        ";

// Fetch the data from the database
$result = get_data($pdo, $query, array($season, $referee));

//Display the results
if (empty($result)) {
    echo "<p>No results found.</p>";
} else {
    echo "<p>Total matches refereed by " . $referee . " in season " . $season . ": " . $result[0]['TotalMatchesRefereed'] . "</p>";
}
?>