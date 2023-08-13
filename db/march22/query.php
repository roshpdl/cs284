
<?php

require_once "../connect.php";

$p1 = $_GET['p1'];
$q = ' select * from rps_matches where player_1_id = ?';
$query = $pdo->prepare($q);
$query->execute([$p1]);
$allrows = $query->fetchAll();
print "<table>\n";
foreach (array_keys($allrows[0]) as $key) {
    print "<th>$key</th>\n";
}
foreach($allrows as $row) {
    // print_r($row);
    $p1 = $row['player_1_id'];
    $p2 = $row['player_2_id'];
    print "<tr>";
    print "<td>$p1</td>";
    print "<td>$p2</td>";
}
print "</table>\n";
?>
