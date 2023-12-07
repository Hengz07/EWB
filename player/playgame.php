<?php
error_reporting(0);
session_start();
include('../private/connection.php');
include('function.php');

$mar_data = check_login($con);

$gameid = $_GET['game'];
$gate = $_GET['gate'];
$idd = $_GET['id'];

$par = "select * from field_par where fpar = '$gameid'";
$pquery = mysqli_query($con,$par);
$pdata = mysqli_fetch_assoc($pquery);
$thispar = $pdata['gate'.$gate];

$gscore = "select * from single_score where player_id = '$idd' and gate_number = '$gate'";
$gsquery = mysqli_query($con,$gscore);
;
if($gsdata = mysqli_fetch_array($gsquery)) {
	header("Location: game.php?id=$idd&field=$gameid&msg=1");
	die;
}
$sql = "insert into single_score (player_id,gate_number,par) values ('$idd','$gate','$thispar')";
$query = mysqli_query($con,$sql);

header("Location: count.php?game=$idd&gate=$gate&fid=$gameid");

?>