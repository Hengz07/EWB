<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../private/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="player.css?v=<?php echo time();?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>

<body>
<div class="container-background">
	<div class="forming">
	<form method="POST">
		<nav>
			 <div class="logo">
				<a href="../default.php"><h6>Pocket Score Woodball</h6></a>
			 </div>
			 <input type="checkbox" id="click">
			 <label for="click" class="menu-btn">
			 <i class="fas fa-bars"></i>
			 </label>
			 <ul>
				<li><a href="../organization/orlogin.php">Organization Login</a></li>
				<li><a class="active" href="ulogin.php">User Login</a></li>
				<li><a href="../marshal/marlogin.php">Marshal Login</a></li>
			 </ul>
		</nav>
		
		<div class="animate__animated animate__bounceIn form">
			<h1>Login</h1>
			<p>Welcome To Woodball Scoreboard</p>
			<?php
				session_start();
					include("../private/connection.php");
					include("function.php");
					
					if($_SERVER['REQUEST_METHOD'] == "POST")
					{
						$user_name = $_POST['user_name'];
						$user_pass = $_POST['user_pass'];
						
						if(!empty($user_name) && !empty($user_pass) && !is_numeric($user_name))
						{
							$query = "select * from users where user_name = '$user_name' limit 1";
							
							$result = mysqli_query($con, $query);
							
							if($result)
							{
								if($result && mysqli_num_rows($result) > 0)
								{
									$user_data = mysqli_fetch_assoc($result);
									
									if($user_data['user_pass'] === $user_pass)
									{
									$_SESSION['id'] =$user_data['id'];
										header("Location: uindex.php");
										die;
									}
								}
							}
							echo "<p style='color:darkred;'>Wrong Username or Password</p>";
						}
					}
			?>
			<div style="text-align: center;">
				<br>
				<label for="user_name"><b>User Name</b></label><br>
				<input type="text" placeholder="Enter Username" name="user_name" id="user_name" required>
				<br><br>

				<label for="user_pass"><b>User Password</b></label><br>
				<input type="password" placeholder="Enter Password" name="user_pass" id="user_pass" required>
				<br><br>
			</div>

			<button type="login" value="login">Login</button>
			<p>Don't have an account? <a href="#" onclick="document.getElementById('flogin').style.display='block'" style="width:auto;">Register</a> here</p>
		</div>
	  
	</form>
	</div>
	
	<div id="flogin" class="flpage">
		<form class="flpage-content" action="">
		<div class="container">
		<center>
			<a href="../organization/oreg.php"><b>Register Organization</b></a>
			<a href="ureg.php"><b>Register User</b></a>
		</center>
		</div>
		</form>
	</div>
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