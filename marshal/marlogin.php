<!DOCTYPE html>
<html>

<head>
	<title>Marshal Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../private/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="marshal.css?v<?php echo time(); ?>">
	<link rel="stylesheet" href="../player/player.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<style>

</style>

<body>

	<form action="marlogin.php" method="POST">
		<nav>
			<div class="logo">
				<a href="../default.php">
					<h6>E-Woodball Sports</h6>
				</a>
			</div>
			<input type="checkbox" id="click">
			<label for="click" class="menu-btn">
				<i class="fas fa-bars"></i>
			</label>
			<ul>
				<li><a href="../organization/orlogin.php">Organization Login</a></li>
				<li><a href="../player/ulogin.php">User Login</a></li>
				<li><a class="active" href="marlogin.php">Marshal Login</a></li>
			</ul>
		</nav>

		<div class="animate__animated animate__bounceIn form">
			<h1>Marshal</h1>
			<p>Welcome To Woodball Scoreboard</p>

			<?php
			session_start();
			include("../private/connection.php");
			include("function.php");

			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				$name = $_POST['name'];
				$code = $_POST['code'];

				if (!empty($name) && !empty($code) && !is_numeric($name)) {
					$query = "select * from marshal where marname = '$name' limit 1";

					$result = mysqli_query($con, $query);

					if ($result) {
						if ($result && mysqli_num_rows($result) > 0) {
							$mar_data = mysqli_fetch_assoc($result);

							if ($mar_data['marcode'] === $code) {
								$_SESSION['mar_id'] = $mar_data['mar_id'];
								header("Location: marindex.php");
								die;
							}
						}
					}
					echo "<p style='color:darkred;'>Wrong Code or Name</p>";
				}
			}
			?>

			<div style="text-align: center;">
				<br>
				<label for="code"><b>Marshal Code</b></label><br>
				<input type="text" placeholder="Enter Code" name="code" id="code" required>
				<br><br>

				<label for="name"><b>Marshal Name</b></label><br>
				<input type="text" placeholder="Enter Name" name="name" id="name" required>
				<br><br>
			</div>

			<button type="login" value="login">Login</button>
			<p>Don't have an account? <a href="#" onclick="document.getElementById('flogin').style.display='block'" style="width:auto;">Register</a> here</p>
		</div>

	</form>

	<div id="flogin" class="flpage">
		<form class="flpage-content" action="">
			<div class="container">
				<center>
					<a href="../organization/oreg.php"><b>Register Organization</b></a>
					<a href="../player/ureg.php"><b>Register User</b></a>
				</center>
			</div>
		</form>
	</div>

	<script>
		// Get the flpage
		var flpage = document.getElementById('flogin');

		// When the user clicks anywhere outside of the flpage, close it
		window.onclick = function(event) {
			if (event.target == flpage) {
				flpage.style.display = "none";
			}
		}
	</script>


</body>

</html>