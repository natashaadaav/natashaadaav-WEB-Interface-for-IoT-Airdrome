<?php

$hn = 'localhost'; // Change this
$db = 'airdrome'; // Change this
$un = 'username'; // Change this
$pw = 'password'; // Change this
$conn = false;

function connectDB(){
	global $conn;
	global $mysqli;
	global $hn;
	global $un;
	global $pw;
	global $db;
	$conn = new mysqli($hn, $un, $pw, $db);
	$conn->query("SET NAMES 'utf-8'");
}

function closeDB(){
	global $conn;
	$conn->close();
}
?>
