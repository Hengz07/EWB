<?php
	session_start();
	include "function.php";
	include "../private/connection.php";

	$org_data = check_login($con);

	$mid = $_GET['mar_id'];
	$game = $_GET['game'];
	$new = random_num(5);

	$sql = "update marshal set marcode = '$new' where mar_id = '$mid'";
	mysqli_query($con,$sql);
	header("Location: recordmar.php?id=$game");
	die;
?>