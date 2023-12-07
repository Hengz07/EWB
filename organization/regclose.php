<?php
	session_start();
	include "function.php";
	include "../private/connection.php";

	$org_data = check_login($con);

	$gameid = $_GET['id'];

	$sql = "update game set link_code = '' where game_id = '$gameid'";
	mysqli_query($con,$sql);
	header("Location: recordgame.php");
	die;
?>