<?php

$host = 'warren.sewanee.edu';
$user = 'pouder0';
$pass = print_pass();
$db = 'cs284_spring23';
$chrs = 'utf8mb4';
$attr = "mysql:host=$host;dbname=$db;charset=$chrs";
$opts = [
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ,
	PDO::ATTR_EMULATE_PREPARES => false
];


function print_pass() {
	return "Ebrain@0909";
}
?>
