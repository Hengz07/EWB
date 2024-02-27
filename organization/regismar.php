<?php
session_start();
include("../private/connection.php");
include("function.php");

$org_data = check_login($con);

?>
<!DOCTYPE html>
<html>

<head>
	<title>Organizer</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../private/style.css">
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

	<form action="regismar.php" method="POST">
		<div class="animate__animated animate__bounceIn form" style="margin-top: 2em; box-shadow: 10px 10px rgba(0,0,0,0.3);">
			<h1>Create the game<br>Marshal</h1>
			<?php

			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				$name = $_POST['name'];
				$phonenum = $_POST['phonenum'];
				$game_id = $_POST['game_id'];
				$plnum = $_POST['playernum'];

				$game = "select * from marshal where marname = '$name'";
				$gquery = mysqli_query($con, $game);

				if (mysqli_num_rows($gquery) > 0) {
					echo "<p style='color:darkred;background:rgba(0,0,0,0.3);'>!!Marshal Name Already Taken!!</p>";
				} else {
					$marcode = random_num(5);
					$insert = "insert into marshal(marcode,marname,marpnum,game_id) values('$marcode','$name','$phonenum','$game_id')";
					mysqli_query($con, $insert);

					$mar = "select * from marshal where game_id = '$game_id' order by mar_id desc";
					$marq = mysqli_query($con, $mar);
					$mard = mysqli_fetch_assoc($marq);
					$marid = $mard['mar_id'];

					$player = "UPDATE game_player SET marshal = '$marid' WHERE game_code = '$game_id' AND marshal is null ORDER BY rand() LIMIT $plnum";
					mysqli_query($con, $player);
					header("Location: marshal.php");
					die;
				}
			}
			?>
			<div>
				<br>
				<label for="name"><b>Marshal Name</b></label><br>
				<input type="text" placeholder="Enter Marshal Name" name="name" id="name" required>
				<br><br>

				<label for="phonenum"><b>Phone Number</b></label><br>
				<input type="number" placeholder="Enter Phone Number" name="phonenum" id="phonenum" required>
				<br /><br />

				<style type="text/css">
					select {
						border-radius: 10px;
						width: 100%;
						text-align: center;
						border: 2px solid black;
						padding: 10px;
						font-size: 1em;
					}
				</style>

				<label for="playernum"><b>Number Of Player</b></label><br>
				<select name="playernum" required>
					<option selected disabled>Select Number Of Player</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
				</select>
				<br><br>

				<label for="field"><b>Game Name</b></label><br>
				<select name="game_id" required>
					<option value="" selected disabled>Select Game name</option>
					<?php
					$orid = $_SESSION['id'];
					$sql = "select * from game where org_id ='$orid'";
					$query = mysqli_query($con, $sql);

					while ($data = mysqli_fetch_array($query)) {
					?>
						<option value="<?php echo $data['game_id']; ?>"><?php echo $data['game_name']; ?></option>
					<?php
					}
					?>
				</select>
				<!--<input type="number" placeholder="Enter Game ID" name="game_id" id="game_id" required> -->
				<br><br>

			</div>
			<br>
			<!--button ni klau dh siap database kita setup balik-->
			<button class="animate__animated animate__bounceInLeft" type="submit" style="box-shadow: 10px 10px rgba(0,0,0,0.3);"><b>Create</b></button>
			&nbsp;<button class="animate__animated animate__bounceInRight" onclick="history.back()" style="box-shadow: 10px 10px rgba(0,0,0,0.3);">Back</button>
		</div>


	</form>
	</center>


</body>

</html>