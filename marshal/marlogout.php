<?php
	session_start();
	include "function.php";
	include '../private/connection.php';

	$id = $_SESSION['mar_id'];
	$sql = "update marshal set marcode = null where mar_id = '$id'";
	mysqli_query($con,$sql);
	
	if(isset($id))
	{
		unset($id);
	}
	
	header("Location: marlogin.php");
	die;
?>