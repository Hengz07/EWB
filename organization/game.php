
<!DOCTYPE html>
<html>
<head>
	<title>Organizer</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../private/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
			<li><a class="active" href="gamecord.php">Game</a></li>
			<li><a href="fieldcord.php">Field</a></li>
			<li><a href="oindex.php">Home</a></li>
			<li><a href="profile.php">Update Profile</a></li>
			<li><a href="orlogout.php">Logout</a></li>
		 </ul>
	</nav>
	<br>
	
	<form action="" method="POST">
		<div class="form" style="box-shadow: 10px 10px rgba(0,0,0,0.3);">
			<h1>Create the Scoreboard</h1>
			<?php
				session_start();
				include("../private/connection.php");
				include("function.php");

				$org_data = check_login($con);

				$game_code = $_GET['game'];
				

				$sql = "select * from game where game_id = '$game_code'";
				$query = mysqli_query($con, $sql);
				$data = mysqli_fetch_assoc($query);

				extract($data);

				for($i=1; $i<=$player; $i++){

			?>
			<div>
				<br>
				<label for="pname"><b>Player Name <?php echo $i; ?></b></label><br>
				<br><input type="text" placeholder="Enter Player Name" name="<?php echo $i.'pname'; ?>" id="pname" required>
				<input type="hidden" name="player" value="<?php echo $player; ?>">
			<?php } ?>
			</div>
			<br>
			<!--button ni klau dh siap database kita setup balik-->
			<button style="box-shadow: 10px 10px rgba(0,0,0,0.3);" type="submit"><b>Create</b></button>
		</div>
	</form>
	<?php
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$plist = $_POST['player'];
		
		
		for($i=1; $i<=$plist; $i++){
			$pname = $_POST[$i.'pname'];
			$player = random_num(4);

			if(!empty($pname)){

			$sql = "insert into game_player (playername,game_code,play_id) values ('$pname', '".$_GET['game']."','$player')";
			mysqli_query($con, $sql);

			header("Location: recordgame.php");
			
			}

			else{
			echo "Please insert all Player Name";
			}
		}
	}
	?>
</center>


</body>
</html>
