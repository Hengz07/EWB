
<!DOCTYPE html>
<html>
<head>
	<title>Organizer</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../private/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>


	<nav>
		 <div class="logo">
			<h6>PSWoodball Organizer</h6>
		 </div>
		 <input type="checkbox" id="click">
		 <label for="click" class="menu-btn">
		 <i class="fas fa-bars"></i>
		 </label>
		 <ul>
			<li><a href="marcord.php">Marshal</a></li>
			<li><a href="gamecord.php">Game</a></li>
			<li><a class="active" href="fieldcord.php">Field</a></li>
			<li><a href="oindex.php">Home</a></li>
			<li><a href="profile.php">Update Profile</a></li>
			<li><a href="orlogout.php">Logout</a></li>
		 </ul>
	</nav>
	<br>

	<form action="" method="POST">
		<div class="animate__animated animate__bounceIn form" style="margin-top:3em; box-shadow: 10px 10px rgba(0,0,0,0.3);">
			<h1>Add field Record</h1>
			<?php
				session_start();
				include("../private/connection.php");
				include("function.php");

				$org_data = check_login($con);

				if($_SERVER['REQUEST_METHOD'] == "POST")
				{
					$fname = $_POST['fieldname'];
					$numfair = $_POST['numfairway'];
					$fpar = random_num(5);
					$orid = $_SESSION['id'];

					if(!empty($fname) && !empty($numfair))
					{
						$query = "insert into field (f_name,f_gate,fpar,org_id) values ('$fname','$numfair','$fpar','$orid')";

						mysqli_query($con, $query);

						header("Location: fieldpar.php?id=$fpar");
						die;
					}

					else
					{
						echo "Blank Input";
					}
				}
			?>
			<div>
				<br>
				<label for="fieldname"><b>field Name</b></label><br>
				<input type="text" placeholder="Enter Field Name" name="fieldname" id="fieldname" required>
				<br><br>

				<label for="numfairway"><b>Number of Fairway</b></label><br>
				<input type="number" placeholder="Enter Fairway Number" name="numfairway" id="numfairway" required>
				<br><br>

			</div>
			<br>
			<!--button ni klau dh siap database kita setup balik-->
			<button class="animate__animated animate__bounceInLeft" type="submit" style="box-shadow: 10px 10px rgba(0,0,0,0.3);"><b>Add</b></button>
			&nbsp;<button class="animate__animated animate__bounceInRight" onclick="history.back()" style="box-shadow: 10px 10px rgba(0,0,0,0.3);">Back</button>
		</div>

	</form>
</center>


</body>
</html>
