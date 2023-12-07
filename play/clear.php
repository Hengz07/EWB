<?php

include "../private/connection.php";

if(isset($_POST['btnsubmit'])){
	$id = $_POST['ids'];
  $ins = "delete from quick where id = '$id'";
  $insq = mysqli_query($con,$ins);

  $del = "delete from quickplay where qid = '$id'";
  mysqli_query($con, $del);

  header("Location: ../default.php");
  die;
}

?>