<?php

session_start();
include '../private/connection.php';
include 'function.php';

$org_data = check_login($con);

?>

<!DOCTYPE html>
<html>

<head>
	<title>Organizer</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../private/style.css">
	<link rel="stylesheet" type="text/css" href="print.css" media="Print">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>

	<nav>
		<div class="logo">
			<h6>E-Woodball Organizer</h6>
		</div>
		<input type="checkbox" id="click">
		<label for="click" class="menu-btn">
			<i class="fas fa-bars"></i>
		</label>
		<ul>
			<li><a class="active" href="marcord.php">Marshal</a></li>
			<li><a href="gamecord.php">Game</a></li>
			<li><a href="fieldcord.php">Field</a></li>
			<li><a href="oindex.php">Home</a></li>
			<li><a href="profile.php">Update Profile</a></li>
			<li><a href="orlogout.php">Logout</a></li>
		</ul>
	</nav>
	<br>

	<style type="text/css">
		input[type="submit"] {
			display: inline-block;
			border-radius: 10px;
			background: yellow;
			border: 1px solid;
			color: black;
			padding: 5px;
			width: 90%;
			margin-top: 5px;
			font-size: 1em;
			text-align: center;
			text-decoration: none;
		}

		input[type="submit"]:hover {
			background: black;
			border: 1px solid rgba(222, 224, 121);
			color: white;
		}

		input {
			border-radius: 10px;
			width: 80%;
			text-align: center;
			border: 2px solid rgba(224, 211, 121);
			padding: 5px;
			font-size: 1em;
		}

		.aa {
			display: inline-block;
			border-radius: 10px;
			background: blue;
			border: 1px solid;
			color: white;
			padding: 5px;
			width: 5%;
			margin-top: 5px;
			margin-right: 5%;
			font-size: 1em;
			text-align: center;
			text-decoration: none;
			float: right;
		}

		.aa:hover {
			background: black;
			border: 1px solid rgba(222, 224, 121);
			color: white;
		}
	</style>

	<button class="aa" onclick="window.print();" id="print-btn">Print</button>

	<style>
		.container table {
			border-collapse: collapse;
			border: 2px solid black;
		}

		.container th {
			background-color: lightgray;
		}

		.container tr:nth-child(even) {
			background-color: white;
		}
	</style>

	<div class="animate__animated animate__bounceIn" style="width:60%; border:2px solid black; box-shadow: 10px 10px rgba(0,0,0,0.3); padding:20px;text-align:center;overflow:hidden;margin:5%auto;border-radius:10px;">

		<h2>Data</h2>

		<div class="container">
			<center>
				<table border="1" width="100%">
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Phone</th>
						<th>Login Code</th>
						<th>Action</th>
					</tr>

					<?php
					$game = $_GET['id'];
					$query = "select * from marshal where game_id = '$game' order by mar_id";
					$result = mysqli_query($con, $query);
					$no = 1;

					while ($row = mysqli_fetch_array($result)) {

						$game = "select * from game where game_id = '" . $row['game_id'] . "'";
						$gquery = mysqli_query($con, $game);
						$gdata = mysqli_fetch_assoc($gquery);
					?>
						<tr>
							<td style="text-align:center;"><?php echo $no++; ?></td>
							<td style="text-align:center;"><?php echo $row['marname']; ?></td>
							<td style="text-align:center;"><?php echo $row['marpnum']; ?></td>
							<td style="text-align:center;">
								<?php
								if ($row['marcode'] == "") {
								?>
									<center><a style="margin-top: 0px;padding: 10px;" href="<?php echo "marcode.php?mar_id=" . $row['mar_id'] . "&game=" . $row['game_id']; ?>">Re-open</a></center>
								<?php
								} else {
									echo $row['marcode'];
								}
								?>
							</td>
							<td style="text-align:center;">
								<form action="usr.php" method="post">
									<input type="hidden" name="id" value="<?php echo $row['mar_id']; ?>" />
									<center><a style="width:95%; margin:5px; padding:10px;" href="<?php echo "mardelete.php?mar_id=" . $row['mar_id'] . "&game=" . $row['game_id']; ?>" id="print-btn" onclick="return confirm('Confirm Delete?');">Delete</a></center>
								</form>
							</td>
						</tr>
					<?php
					}
					?>
				</table>
			</center>
		</div>
		<br><br><br><br><br><br>
		<button class="animate__animated animate__bounceInUp" onclick="history.back()" id="print-btn" style="box-shadow: 10px 10px rgba(0,0,0,0.3);">Back</button>
	</div>
	</div>

</body>

</html>