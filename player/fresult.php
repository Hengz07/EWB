<?php

session_start();
include "../private/connection.php";
include "function.php";

$user_data = check_login($con);

if(isset($_POST['btnsubmit'])){
	$totals = $_POST['totals'];
	$id = $_POST['ids'];
  $ins = "update single_player set total = '$totals' where id = '$id'";
  $insq = mysqli_query($con,$ins);

  header("Location: uindex.php");
  die;
}

?>