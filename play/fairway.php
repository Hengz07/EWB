<!DOCTYPE html>
<html>

<head>
	<title>Quick Play</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../private/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

	<style>
		.form {
			box-shadow: 10px 10px rgba(0, 0, 0, 0.3);
		}
	</style>

	<nav>
		<div class="logo">
			<h6>E-Woodball Quick Play</h6>
		</div>
		<input type="checkbox" id="click">
		<label for="click" class="menu-btn">
			<i class="fas fa-bars"></i>
		</label>
		<ul>
			<li><a href="../default.php">Home</a></li>
		</ul>
	</nav>
	<form action="setfairway.php" method="post">
		<div class="form">
			<center>
				<h2>Fairway Setup</h2>
				<br>
				<div class="container">
					<br />
					<input type="text" name="gameDate" value="<?php echo date('d-M-Y') ?>" disabled>
					<br><br><br>
					<input type="number" name="numfair" placeholder="Number Of Fairway" required>
					<br><br>
					<button type="submit" name="submit">Next</button>
				</div>
			</center>
		</div>
	</form>
</body>

</html>