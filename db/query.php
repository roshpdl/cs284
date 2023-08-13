
<?php

require_once "connect.php";

$q = 'select * from rps_players where is_human = 1';
$query = $pdo->prepare($q);
$query->execute();
$allrows = $query->fetchAll();
print "<table>\n";
print "<th>player_id</th>\n"
    ."<th>is_human</th>\n"
    ."<th>display_name</th>\n";

foreach($allrows as $row) {
    print "<tr>\n"
        ."<td>$row[player_id]</td>\n"
        ."<td>$row[is_human]</td>\n"
        ."<td>$row[display_name]</td>\n"
        ."</tr>\n";

}
print "</table>\n"
?>
