<!DOCTYPE html>
<html>

<head>
	<title>Organization Register</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../private/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../player/player.css?v=<?php echo time();?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>

<!--background body nnti blh tuka gamba wb bru smart-->
<body>

<style type="text/css">
	input[type="submit"]{
		border-radius: 10px;
		background-color: rgba(16, 15, 15, 0.7);
	  color: white;
		border: 2px solid;
		padding:0.7em;
		width: 10em;
		margin-top: 5px;
		font-size:1em;
		text-align: center;
	}

	input[type="submit"]:hover{
		color: white;
		background: black;
		border: 2px solid rgba(222, 224, 121);
	}
</style>

<form action="oreg.php" method="POST">
	<nav>
         <div class="logo">
            <a href="../default.php"><h6>Pocket Score Woodball</h6></a>
         </div>
         <input type="checkbox" id="click">
         <label for="click" class="menu-btn">
         <i class="fas fa-bars"></i>
         </label>
         <ul>
            <li><a href="../player/ureg.php">Register User</a></li>
         </ul>
    </nav>
	
	<div class="animate__animated animate__bounceIn form" >
		<h1>Sign Up</h1>
		<p>Please fill in this form to create an account.</p>
		<?php

			include '../private/connection.php';

			if (isset($_POST['register'])) {
				
				$name = $_POST['org_name'];
				$email = $_POST['email'];
				$address = $_POST['org_address'];
				$pnum = $_POST['org_pnum'];
				$pass = $_POST['org_pass'];

				$select = "select * from org_req where org_email = '$email'";
				$result = mysqli_query($con,$select);
		
				if(mysqli_num_rows($result) > 0){
					echo "<p style='color:darkred;'>Email already taken</p>";
				}
				else{
					$register = "insert into org_req (org_name, org_email, org_address, org_pnum, org_pass, status) values ('$name', '$email', '$address', '$pnum', '$pass', 'request')";
					mysqli_query($con,$register);
					echo "<p style='color:darkred;'>Thank You,Please wait for admin to Approve</p>";
				}
			}
		?>

		<div style="text-align: center;">
			<br>
			<label for="org_name"><b>Organization Name</b></label><br>
			<input type="text" placeholder="Enter Organization Name" name="org_name" id="org_name" required>
			<br><br>

			<label for="email"><b>Organization Email</b></label><br>
			<input type="email" placeholder="Enter Organization Email" name="email" id="email" required>
			<br><br>

			<label for="org_address"><b>Organization Address</b></label><br>
			<input type="address" placeholder="Enter Organization Address" name="org_address" id="org_address" required>
			<br><br>

			<label for="org_pnum"><b>Phone Number</b></label><br>
			<input type="number" placeholder="Enter Phone Number" name="org_pnum" id="org_pnum" required>
			<br><br>

			<label for="org_pass"><b>Organization Password</b></label><br>
			<input type="password" placeholder="Enter Password" name="org_pass" id="org_pass" required>
			<br><br>
		</div>
		<br>

		<p>By creating an account you agree to our <a href="">Terms & Privacy</a>.</p>

		<!--button ni klau dh siap database kita setup balik-->
		<center><input type="submit" name="register" value="Sign Up"></center>
		<p>Already have an account? <a href="#" onclick="document.getElementById('flogin').style.display='block'" style="width:auto;">Log In</a> here</p>
	</div>
	
</form>

<div id="flogin" class="flpage">
	<form class="flpage-content" action="">
    <div class="container">
	<center>
		<a href="orlogin.php"><b>Organization Login</b></a>
		<a href="../player/ulogin.php"><b>User Login</b></a>
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