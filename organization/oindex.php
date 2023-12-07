<?php

	session_start();
		include('../private/connection.php');
		include('function.php');

		$org_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Organizer Homepage</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../private/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	
</head>
<style>

	.ok .container a{
		width: 100%;
		padding: 1em;
	}
	.ok{
		width:30%; 
		border: 2px solid black;
		padding:20px;
		text-align:center;
		overflow:hidden;
		margin-top: 4em;
		border-radius:10px; 
		box-shadow: 10px 10px rgba(0,0,0,0.3);
	}

	@media screen and (max-width:424px) {
		.ok{
			width: 80%;
			margin-top: 1.5em;
		}
	}
	
</style>
<body>

	<nav>
		 <div class="logo">
			<h6>PSWoodball Organizer</h6>
		 </div>
		 <input type="checkbox" id="click">
		 <label for="click" class="menu-btn">
		 <i class="fas fa-bars"></i>
		 </label>
		 <ul>
		 	<li><a class="active" href="oindex.php">Home</a></li>
			<li><a href="profile.php">Update Profile</a></li>
			<li><a href="orlogout.php">Logout</a></li>
		 </ul>
	</nav>

	<div class="animate__animated animate__fadeInDown" style="background-color: white; border:2px solid black;">
	<h2 style="text-align:center;"><?php echo $org_data['org_name']; ?></h2>
	<h2 style="text-align: center;" ><?php echo date('d-M-Y'); ?></h2>
	</div>

	<center>
	<div class="animate__animated animate__bounceIn ok">

		<h2>Menu</h2>
		<div class="container">
			<center>
			<a class="animate__animated animate__bounceInLeft" href="gamecord.php"><b>Game</b></a>
			<a class="animate__animated animate__bounceInRight" href="marcord.php"><b>Marshal</b></a>
			<a class="animate__animated animate__bounceInLeft" href="fieldcord.php"><b>Field</b></a>
			<!--<a href="orecord.php"><b>Organizer Record</b></a>-->
			</center>
		</div>
	</div>
	</center>
</body>
</html>
