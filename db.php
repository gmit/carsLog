<?php
include_once "config.php";
$mysqli = new mysqli(DB_HOST,DB_NAME,DB_PASSWORD,DB_USER);
if ($mysqli->connect_errno) {
	die("Failed to connecs to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
}
$mysqli->query("SET NAMES DB_CHARSET");

?>