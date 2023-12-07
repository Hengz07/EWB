<!DOCTYPE html>
<html>

<head>
<title>User Register</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../private/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../player/player.css?v=<?php echo time();?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>

<body>

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
		<li><a href="../organization/oreg.php">Register Organization</a></li>
		</ul>
    </nav>
	<div class="animate__animated animate__bounceIn form">
		<h1>Sign Up</h1>
		<p>Please fill in this form to create an account.</p>

		<?php
			session_start();
				include("../private/connection.php");
				include("function.php");
				
				if($_SERVER['REQUEST_METHOD'] == "POST")
				{
					$user_name = $_POST['user_name'];
					$user_pass = $_POST['user_pass'];
					$user_pass2 = $_POST['user_pass_repeat'];
					$user_email = $_POST['user_email'];
					
					if(!empty($user_name) && !empty($user_email) && !empty($user_pass) && !empty($user_pass2) && !is_numeric($user_name))
					{
						if ($user_pass2 == $user_pass) {
							$query = "insert into users (user_name,user_email,user_pass) values ('$user_name','$user_email','$user_pass')";
						
							mysqli_query($con, $query);
							
							header("Location: ulogin.php");
							die;
						}
						if ($user_pass2 != $user_pass) {
							echo "<p style='color:darkred;'>Password Not Match</p>";
						}
						else
						{
							echo "Please fill all the information";
						}
						
					}
				}	
		?>

		<hr>

		<div style="text-align: center;">
			<br>
			<label for="user_name"><b>Username</b></label><br>
			<input type="text" placeholder="Enter Username" name="user_name" required>
			<br><br>

			<label for="user_email"><b>Email</b></label><br>
			<input type="email" placeholder="Enter Email" name="user_email" required>
			<br><br>

			<label for="user_pass"><b>Password</b></label><br>
			<input type="password" placeholder="Enter Password" name="user_pass" required>
			<br><br>

			<label for="user_pass_repeat"><b>Repeat Password</b></label><br>
			<input type="password" placeholder="Repeat Password" name="user_pass_repeat" required>
		</div>
		<br>
		<hr>

		<p>By creating an account you agree to our <a href="">Terms & Privacy</a>.</p>

		<!--button ni klau dh siap database kita setup balik-->
		<button type="submit"><b>Sign Up</b></button>
		<p>Already have an account? <a href="#" onclick="document.getElementById('flogin').style.display='block'" style="width:auto;">Log In</a> here</p>
	</div>
	
</form>

<div id="flogin" class="flpage">
	<form class="flpage-content" action="">
    <div class="container">
	<center>
		<a href="../organization/orlogin.php"><b>Organization Login</b></a>
		<a href="ulogin.php"><b>User Login</b></a>
		<a href="../marshal/marlogin.php"><b>Marshal Login</b></a>
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