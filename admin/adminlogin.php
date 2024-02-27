
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../private/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../player/player.css?v=<?php echo time();?>">
</head>

<body style="background-color: rgba(38, 194, 129,1);">

	<form method="POST">
		<nav>
			 <div class="logo">
				<a href="../default.php"><h6>E-Woodball Sports</h6></a>
			 </div>
			 <input type="checkbox" id="click">
			 <label for="click" class="menu-btn">
			 <i class="fas fa-bars"></i>
			 </label>
			 <ul>
				<li><a class="active" href="adminlogin.php">Admin</a></li>
				<li><a href="../organization/orlogin.php">Organization Login</a></li>
				<li><a href="../player/ulogin.php">User Login</a></li>
				<li><a href="../marshal/marlogin.php">Marshal Login</a></li>
			 </ul>
		</nav>

		<div class="form" style="box-shadow: 10px 10px rgba(0,0,0,0.3);">
			<h1>Admin</h1>
			<p>Lets Create Something New</p>
			<?php
				session_start();
					include("../private/connection.php");
					include("function.php");

					if($_SERVER['REQUEST_METHOD'] == "POST")
					{
						$name = $_POST['name'];
						$password = $_POST['password'];

						if(!empty($name) && !empty($password) && !is_numeric($name))
						{
							$query = "select * from admin where name = '$name' limit 1";

							$result = mysqli_query($con, $query);

							if($result)
							{
								if($result && mysqli_num_rows($result) > 0)
								{
									$admin_data = mysqli_fetch_assoc($result);

									if($admin_data['password'] === $password)
									{
									$_SESSION['id'] =$admin_data['id'];
										header("Location: admin.php");
										die;
									}
								}
						}
						echo "<p style='color:darkred;'>Wrong Name or Password</p>";
					}
				}
			?>

			<div style="text-align: center;">
				<br>
				<label for="name"><b>Name</b></label><br>
				<input type="text" placeholder="Enter Admin Name" name="name" id="name" required>
				<br><br>

				<label for="password"><b>Password</b></label><br>
				<input type="password" placeholder="Enter Password" name="password" id="password" required>
				<br><br>
			</div>

			<button type="login" value="login">Login</button>
		</div>

	</form>

</body>
</html>
