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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>

	<style>
		.form {
			box-shadow: 10px 10px rgba(0, 0, 0, 0.3);
		}
	</style>

	<nav>
		<div class="logo">
			<h6>E-Woodball Player</h6>
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
	<form action="fairway.php" method="post">
		<div class="form animate__animated animate__bounceIn">
			<center>
				<h2>Fairway Setup</h2>
				<br>
				<div class="container">
					<br />
					<input style="color:black;" type="text" name="gameDate" value="<?php echo date('d-M-Y') ?>" disabled>
					<br><br><br>
					<input type="number" name="numfair" placeholder="Number Of Fairway" required>
					<br><br>
					<button class="animate__animated animate__bounceInUp" type="submit" name="submit">Next</button>
				</div>
			</center>
		</div>
	</form>
</body>

</html>