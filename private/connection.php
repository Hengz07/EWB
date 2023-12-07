<?php
	$dbhost = "localhost";
	$dbuser = "u478659771_ldwps";
	$dbpass = "PSwoodball2022";
	$dbname = "u478659771_nwps";

	$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

	if(!$con)
	{
		die("failed to connect");
	}
?>
