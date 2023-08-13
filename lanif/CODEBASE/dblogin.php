<?php
$config = json_decode(file_get_contents('../CONFIG/config.json'), true); //true makes it an associative array instead of an object

$host = $config['host'];
$user = $config['user'];
$pass = $config['pass'];
$db = $config['db'];
$chrs = $config['chrs'];
$attr = "mysql:host=$host;dbname=$db;charset=$chrs";
$opts = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES => false
];

?>
