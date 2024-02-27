<?php

session_start();
include("../private/connection.php");
include("function.php");

$linkid = $_GET['id'];

$sql = "select * from game where link_code = $linkid";
$query = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($query);
extract($data);

$orgsql = "select * from org_req where id = $org_id";
$orgquery = mysqli_query($con, $orgsql);
$orgdata = mysqli_fetch_assoc($orgquery);

?>

<!DOCTYPE html>
<html>

<head>
	<title>Player Register</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../private/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../player/player.css?v=<?php echo time(); ?>">
</head>

<body>

	<form method="POST">

		<nav>
			<div class="logo">
				<a href="../default.php">
					<h6>E-Woodball Sports</h6>
				</a>
			</div>
			<input type="checkbox" id="click">
			<label for="click" class="menu-btn">
				<i class="fas fa-bars"></i>
			</label>
			<ul>
				<li><a href="/">Home</a></li>
			</ul>
		</nav>
		<div class="form">
			<h1>Register Player</h1>
			<p>Please fill in this form to join:</p>
			<p style="color:white; background-color: rgba(0,0,0,0.3);"><?php echo $game_name; ?></p>
			<p>Organized By:</p>
			<p style="color:white; background-color: rgba(0,0,0,0.3);"><?php echo $orgdata['org_name']; ?></p>

			<?php

			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				$fname = $_POST['full_name'];
				$uname = $_POST['user_name'];
				$uic = $_POST['user_ic'];
				$email = $_POST['user_email'];
				$pnum = $_POST['pnum'];
				$address = $_POST['address'];

				if (!empty($fname) && !empty($email) && !empty($uname) && !empty($uic) && !empty($pnum) && !empty($address) && is_numeric($pnum) && is_numeric($uic)) {
					$check = "select * from game_player where game_code = '$game_id' and uic = '$uic'";
					$checkquery = mysqli_query($con, $check);

					if (mysqli_num_rows($checkquery) > 0) {
						echo "<script>alert('Player already listed in this event.')</script>";
					} else {
						$checkname = "select * from game_player where game_code = '$game_id' and username = '$uname'";
						$checknamequery = mysqli_query($con, $checkname);

						if (mysqli_num_rows($checknamequery) > 0) {
							echo "<p style='color:darkred;'>!!Username Already Taken!!</p>";
						} else {
							$insert = "insert into game_player (fullname,username,uic,email,pnum,address,game_code) values ('$fname','$uname','$uic','$email','$pnum','$address','$game_id')";
							$insertquery = mysqli_query($con, $insert);

							$addplayer = $player + 1;
							$orgupdate = "update game set player = '$addplayer' where link_code = '$linkid'";
							$update = mysqli_query($con, $orgupdate);

							echo "<script>alert('Success!!$uname Joined the event.')</script>";
						}
					}
				} else {
					echo "<p style='color:darkred;'>Please fill all the information</p>";
				}
			}
			?>

			<style type="text/css">
				textarea {
					border-radius: 10px;
					width: 100%;
					border: 2px solid black;
					text-align: center;
					padding: 10px;
					font-size: 1em;
				}
			</style>

			<hr>

			<div style="text-align: center;">
				<br>

				<label for="full_name"><b>Full Name</b></label><br>
				<input type="text" placeholder="Enter Full Name" name="full_name" required>
				<br><br>

				<label for="user_name"><b>Username</b></label><br>
				<input type="text" placeholder="Enter Username" name="user_name" required>
				<br><br>

				<label for="user_ic"><b>Identity Card</b></label><br>
				<input type="text" placeholder="Enter Identity Card" name="user_ic" required>
				<br><br>

				<label for="user_email"><b>Email</b></label><br>
				<input type="email" placeholder="Enter Email" name="user_email" required>
				<br><br>

				<label for="pnum"><b>Phone Number</b></label><br>
				<input type="text" placeholder="Enter Phone Number" name="pnum" required>
				<br><br>

				<label for="address"><b>Faculty/Address</b></label><br>
				<textarea placeholder="Enter Faculty Name/Address" name="address" required></textarea>
			</div>
			<br>
			<hr>

			<p>By registering as player, you agree to participate in the event day.</p>

			<!--button ni klau dh siap database kita setup balik-->
			<button type="submit"><b>Join Game</b></button>
		</div>
	</form>
</body>

</html>