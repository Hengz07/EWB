
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
			<li><a class="active" href="gamecord.php">Game</a></li>
			<li><a href="fieldcord.php">Field</a></li>
			<li><a href="oindex.php">Home</a></li>
			<li><a href="profile.php">Update Profile</a></li>
			<li><a href="orlogout.php">Logout</a></li>
		 </ul>
	</nav>
	<br>

	<form action="" method="POST">
		<div class="animate__animated animate__bounceIn form" style="margin-top: 1em; box-shadow: 10px 10px rgba(0,0,0,0.3);">
			<h1>Create the Scoreboard</h1>
			<?php
				session_start();
				include("../private/connection.php");
				include("function.php");

				$org_data = check_login($con);
			?>
			<div>
				<br>
				<label for="player"><b>Game Date</b></label><br>
				<input type="date" name="game_date" id="game_date" required>
				<br>
				<br/>
				<label for="player"><b>Game Name</b></label><br>
				<input type="text" name="game_name" id="game_name" placeholder="Enter Game Name" required>
				<br>
				<br/>
				<label for="field"><b>Field</b></label><br>
				<style type="text/css">
					select{
						border-radius: 10px;
						width: 100%;
						text-align: center;
						border: 2px solid black;
						padding: 10px;
						font-size: 1em;
					}
				</style>
				<select name="field" required>
				<option value="">Select Field</option>
				<?php
					$sql = "select * from field";
					$query = mysqli_query($con,$sql);

					while($data = mysqli_fetch_array($query)){
				?>
				<option><?php echo $data['f_name']; ?></option>
				<?php
					}
				?>
				</select>
				<br>

			</div>
			<br>
			<!--button ni klau dh siap database kita setup balik-->
			<button class="animate__animated animate__bounceInLeft" onclick="history.back()">Back</button>
			<button class="animate__animated animate__bounceInRight" type="submit" name="submit"><b>Next</b></button>
			
		</div>
	</form>
</center>
</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$org_id = $_SESSION['id'];
	$field = $_POST['field'];
	$game_date = $_POST['game_date'];
	$game_name = $_POST['game_name'];
	$link_code = random_num(5);

	if(!empty($game_name))
	{
		$query = "insert into game (game_date,game_name,fieldName,player,link_code,org_id) values ('$game_date','$game_name','$field','0','$link_code','$org_id')";
		$insertQuery= mysqli_query($con, $query);
		header("Location: recordgame.php");
		die;
	}
}
?>
