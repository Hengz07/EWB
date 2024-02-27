<?php
session_start();
include('../private/connection.php');
include('function.php');

$admin_data = check_login($con);
?>
<!DOCTYPE html>
<html>

<head>
	<title>Manager</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../private/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
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
			<li><a class="active" href="org.php">Organization</a></li>
			<li><a href="marsh.php">Marshal</a></li>
			<li><a href="usr.php">User</a></li>
			<li><a href="field.php">Field</a></li>
			<li><a href="admin.php">Home</a></li>
			<li><a href="profile.php">Update Profile</a></li>
			<li><a href="alogout.php">Logout</a></li>
		</ul>
	</nav>

	<div style="width:30%; border:2px solid black; box-shadow: 10px 10px rgba(0,0,0,0.3); padding:20px;text-align:center;overflow:hidden;margin:5%auto;border-radius:10px;">

		<h2>Organization</h2>

		<div class="container">
			<center>
				<a href="orgreq.php"><b>Requests</b></a>
				<a href="orgdata.php"><b>Data</b></a>
			</center>
		</div>
	</div>

</body>

</html>