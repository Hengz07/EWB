<?php
session_start();
include '../private/connection.php';
include 'function.php';

$mar_data = check_login($con);
$game = $_GET['game'];
$gate = $_GET['gate'];

$sql = "select * from game_score where game_id='$game' and gate='$gate'";
$query = mysqli_query($con,$sql);
$data = mysqli_fetch_array($query);

$pts = $data['point'];
$i=0;

$up = "update game_score set point='$i', ob='$i' where game_id='$game' and gate='$gate'";
mysqli_query($con,$up);

header("Location: marshallayout.php?game=$game&gate=$gate");
die;



?>