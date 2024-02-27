<?php
	session_start();
		include('../private/connection.php');
		include('function.php');

		$admin_data = check_login($con);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Homepage</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../private/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-color: rgba(38, 194, 129,1);">

	<nav>
		 <div class="logo">
			<h6>E-Woodball Admin</h6>
		 </div>
		 <input type="checkbox" id="click">
		 <label for="click" class="menu-btn">
		 <i class="fas fa-bars"></i>
		 </label>
		 <ul>
			<li><a class="active" href="admin.php">Home</a></li>
			<li><a href="profile.php">Update Profile</a></li>
			<li><a href="alogout.php">Logout</a></li>
		 </ul>
	</nav>
	<style>
		.info{
			background-color: white;
			border: 2px solid black;
		}
		.main{
			width:50%; box-shadow: 10px 10px rgba(0,0,0,0.3);border:2px solid black;padding:20px;text-align:center;overflow:hidden;margin:5%auto;border-radius:10px;
		}
		@media screen and (max-width:424px) {
			.main{
				width: 90%;
			}
		}
	</style>
	<center>
		<div class="info">
		<h2>Hello, <?php echo $admin_data['name']; ?>.</h2>
 		<h2><?php echo date('d-M-Y') ?></h2>
		</div>
	</center>
	<div class="main" >

		<h2>Menu</h2>

		<div class="container" >
			<center>
				<a href="org.php"><b>Organization</b></a>
				<a href="marsh.php"><b>Marshal</b></a>
				<a href="usr.php"><b>User</b></a>
				<a href="field.php"><b>Field</b></a>
		</div>
	</div>

</body>
</html>
