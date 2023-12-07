<?php
$dbhost = "localhost";
$dbuser = "u418262249_ewbs";
$dbpass = "E-wbsports2024";
$dbname = "u418262249_ewb";

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$con) {
	die("failed to connect");
}
