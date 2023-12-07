
<!DOCTYPE html>
<html>
<head>
	<title>Organization Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../private/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../player/player.css?v=<?php echo time();?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>

<body>
	<form action="" method="POST">
		<nav>
			 <div class="logo">
				<a href="../default.php"><h6>Pocket Score Woodball</h6></a>
			 </div>
			 <input type="checkbox" id="click">
			 <label for="click" class="menu-btn">
			 <i class="fas fa-bars"></i>
			 </label>
			 <ul>
				<li><a class="active" href="orlogin.php">Organization Login</a></li>
				<li><a href="../player/ulogin.php">User Login</a></li>
				<li><a href="../marshal/marlogin.php">Marshal Login</a></li>
			 </ul>
		</nav>

		<div class="animate__animated animate__bounceIn form" style="box-shadow: 10px 10px rgba(0,0,0,0.3);">
			<h1>Organizer</h1>
			<p>Welcome To Pocket Score Woodball</p>
			<?php
				session_start();
					include("../private/connection.php");
					include("function.php");

					if($_SERVER['REQUEST_METHOD'] == "POST")
					{
						$org_email = $_POST['org_email'];
						$org_pass = $_POST['org_pass'];

						if(!empty($org_email) && !empty($org_pass) && !is_numeric($org_email))
						{
							$query = "select * from org_req where status = 'approved' and org_email = '$org_email' limit 1";

							$result = mysqli_query($con, $query);

							if($result)
							{
								if($result && mysqli_num_rows($result) > 0)
								{
									$org_data = mysqli_fetch_assoc($result);

									if($org_data['org_pass'] === $org_pass)
									{
									$_SESSION['id'] =$org_data['id'];
										header("Location: oindex.php");
										die;
									}
									echo "<p style='color:darkred;'>Email atau Password salah</p>";

								}
							}
							
						}
						if(!empty($org_email) && !empty($org_pass) && !is_numeric($org_email))
						{
							$query = "select * from org_req where status = 'request' and org_email = '$org_email' limit 1";

							$result = mysqli_query($con, $query);

							if($result)
							{
								if($result && mysqli_num_rows($result) > 0)
								{
									$org_data = mysqli_fetch_assoc($result);

									if($org_data['org_pass'] === $org_pass)
									{
									$_SESSION['id'] =$org_data['id'];
										echo '<script>alert("your registration on process")</script>';
									}
								}
								echo "<p style='color:darkred;'> Wrong Email or Password</p>";
							}
						}
					}
			?>

			<div style="text-align: center;">
				<br>
				<label for="org_email"><b>Organization Email</b></label><br>
				<input type="text" placeholder="Enter Email" name="org_email" id="org_email" required>
				<br><br>

				<label for="org_pass"><b>Password</b></label><br>
				<input type="password" placeholder="Enter Password" name="org_pass" id="org_pass" required>
				<br><br>
			</div>

			<button type="login" value="login">Login</button>
			<p>Don't have an account? <a href="#" onclick="document.getElementById('flogin').style.display='block'" style="width:auto;">Register</a> here</p>
		</div>
	</form>

	<div id="flogin" class="animate__animated animate__fadeIn flpage">
		<form class="flpage-content" action="">
		<div class="container">
		<center>
			<a class="animate__animated animate__bounceInLeft" href="oreg.php"><b>Register Organization</b></a>
			<a class="animate__animated animate__bounceInRight" href="../player/ureg.php"><b>Register User</b></a>
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
