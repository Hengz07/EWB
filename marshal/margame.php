<?php

session_start();
include('../private/connection.php');
include('function.php');

$mar_data = check_login($con);

$gameid = $_GET['game'];
$gate = $_GET['gate'];

//echo "<pre>";
//print_r($_GET);
//echo "</pre>";

//die;

$game = "select * from game where game_id = '$gameid'";
$gquery = mysqli_query($con,$game);
$gdata = mysqli_fetch_assoc($gquery);
$fname = $gdata['fieldName'];

$field = "select * from field where f_name = '$fname'";
$fquery = mysqli_query($con,$field);
$fdata = mysqli_fetch_assoc($fquery);
$fgate = $fdata['f_gate'];
$fpar = $fdata['fpar'];


$par = "select * from field_par where fpar = '$fpar'";
$pquery = mysqli_query($con,$par);
$pdata = mysqli_fetch_assoc($pquery);
$thispar = $pdata['gate'.$gate];

$gplayer = "select * from game_player where game_code='$gameid' and marshal = '".$_SESSION['mar_id']."'";
$gpquery = mysqli_query($con,$gplayer);


while ($gpdata = mysqli_fetch_array($gpquery)) {
	extract($gpdata);

	$gscore = "select * from game_score where play_id = '$id' and gate = '$gate'";
	$gsquery = mysqli_query($con,$gscore);
	
	if($gsdata = mysqli_fetch_array($gsquery)) {
		header("Location: marindex.php?msg=Game Already Marked");
		die;
	}
	$sql = "insert into game_score (play_id,game_id,gate,par) values ('$id','$gameid','$gate','$thispar')";
	$query = mysqli_query($con,$sql);

	header("Location: marshallayout.php?game=$gameid&gate=$gate");

}

?>