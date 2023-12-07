<?php
	session_start();
		include('../private/connection.php');
		include('function.php');
		
		$user_data = check_login($con);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Quick Play</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../private/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

		<nav>
			 <div class="logo">
				<h6>Woodball Player</h6>
			 </div>
			 <input type="checkbox" id="click">
			 <label for="click" class="menu-btn">
			 <i class="fas fa-bars"></i>
			 </label>
			 <ul>
				<li><a href="uindex.php">Home</a></li>
				<li><a href="profile.php">Update Profile</a></li>
				<li><a href="ulogout.php">Logout</a></li>
			 </ul>
		</nav>
	<form action="upar.php" method="post">
		<div class="form">
		<center>
			<h4>Fairway Setup</h4>
			<br>
			<hr>

			<div class="container">
				<br>
				<input type="number" name="numfair" placeholder="Number Of Fairway">
				<br><br>

				<hr>
				<button type="submit">Next</button>
			</div>
		</center>
		</div>
	</form>
</body>
</html>