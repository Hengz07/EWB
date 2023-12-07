<?php
	session_start();
		include('../private/connection.php');
		include('function.php');
		
		$user_data = check_login($con);
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Homepage</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../private/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<style>
	#a{
		width: auto;
		padding: 1em;
	}
	.find{
		width:50%; background:rgba(38, 194, 129,1);padding:20px;text-align:center;overflow:hidden;margin:5%auto;border-radius:10px; color: black;
    	border: 1px solid;
    	box-shadow: 10px 10px rgba(0,0,0,0.3);
	}
	@media screen and (max-width:424px) {
		.find{
			width: 80%;
		}
	}
</style>
<body>
	
	<nav>
		 <div class="logo">
			<h6>PSWoodball Player</h6>
		 </div>
		 <input type="checkbox" id="click">
		 <label for="click" class="menu-btn">
		 <i class="fas fa-bars"></i>
		 </label>
		 <ul>
			<li><a class="active" href="uindex.php">Home</a></li>
			<li><a href="profile.php">Update Profile</a></li>
			<li><a href="ulogout.php">Logout</a></li>
		 </ul>
	</nav>

	<h2 class="animate__animated animate__fadeInDown" style="text-align: center; border-style:solid; border-color:black; width:100%; background-color:white; padding:5px">Hello, <?php echo $user_data['user_name']; ?>.</h2>
	<br>
	<div class="find animate__animated animate__bounceIn">

		<h1>Menu</h1>
		<div class="container">
			<center>
			<a class="animate__animated animate__bounceInLeft" id="a" href="uqplay.php"><b>Quick Play</b></a>
			<a class="animate__animated animate__bounceInRight" id="a" href="field.php"><b>Select Field</b></a>
			<a class="animate__animated animate__bounceInLeft" id="a" href="record.php"><b>Player Record</b></a>
			</center>
		</div>
	</div>

</body>
</html>