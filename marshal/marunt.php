<?php

session_start();
include('../private/connection.php');
include('function.php');

$user_data = check_login($con);

$ids = $_GET['id'];
$gate = $_GET['gate'];
$gameid = $_GET['game'];


$sql = "select * from game_score where play_id = '$ids' and gate = '$gate'";
$query = mysqli_query($con,$sql);
$data = mysqli_fetch_array($query);
extract($data);


$max = 0;
$i = 1;

if($point > $max){
	$total = $point - $i;
	$score = "update game_score set point = '$total' where play_id = '$ids' and gate = '$gate'";
	$squery = mysqli_query($con,$score);

	header("Location: marshallayout.php?game=$gameid&gate=$gate");
	die;
}
header("Location: marshallayout.php?game=$gameid&gate=$gate");

?>
