<?php
error_reporting(0);
session_start();
include('../private/connection.php');
include('function.php');

$user_data = check_login($con);
$playid = $_GET['id'];
$gate = $_GET['field'];

if ($msg = $_GET['msg']) {
	echo '<script>alert("Game Already Marked")</script>';
}

$field = "select * from field where fpar = '$gate'";
$fquery = mysqli_query($con, $field);
$fdata = mysqli_fetch_assoc($fquery);
$fgate = $fdata['f_gate'];
$fieldname = $fdata['f_name'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="../private/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="player.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<title>Marshal</title>
</head>

<body>

	<nav>
		<div class="logo">
			<a href="default.php">
				<h6>Pocket Score Woodball</h6>
			</a>
		</div>
		<input type="checkbox" id="click">
		<label for="click" class="menu-btn">
			<i class="fas fa-bars"></i>
		</label>
		<ul>
			<li><a href="uindex.php">Home</a></li>
			<li><a href="profile.php">Update Profile</a></li>
			<li><a href="ulogout.php">Logout</a></li>
		</ul>
	</nav>

	<form action="" method="POST">
		<div class="form animate__animated animate__bounceIn">
			<h1>Woodball Scoreboard</h1>
			<br>
			<h3><?php echo $fieldname; ?></h3>

			<style type="text/css">
				.aa {
					display: inline-block;
					border-radius: 10px;
					background: #fff;
					border: 2px solid;
					color: black;
					padding: 5px;
					width: 90%;
					margin-top: 5px;
					font-size: 1em;
					text-align: center;
					text-decoration: none;
				}

				.aa:hover {
					background: black;
					border: 1px solid rgba(222, 224, 121);
					color: white;
				}

				#res {
					border-radius: 10px;
					background-color: rgba(16, 15, 15, 0.7);
					color: white;
					border: 2px solid;
					padding: 0.7em;
					width: 10em;
					margin-top: 5px;
					font-size: 1em;
					text-align: center;
					text-decoration: none;
					display: inline-block;
				}

				#res:hover {
					color: white;
					background: black;
					border: 2px solid rgba(222, 224, 121);
				}

				.list a{
					width: calc(100% / 4 - 15px);
				}
			</style>

			<center>
				<div class="list">
					<?php

					$i = 1;

					while ($i <= $fgate) {
					?>
						<a class="aa animate__animated animate__fadeInUp" href="playgame.php?game=<?php echo $gate . '&gate=' . $i . '&id=' . $playid; ?>" onclick="return confirm('Are You Sure You Want To Start Gate <?php echo $i; ?> ?')"> Gate <?php echo $i; ?></a>
					<?php
						$i++;
					}

					?>
				</div>
			</center>

			<br>
			<bR>
			<input type="hidden" name="game" value="<?php echo $data['game_id']; ?>">
			<a class="animate__animated animate__bounceInUp" id="res" href="result.php?check=<?php echo $playid; ?>">Result</a>
		</div>

	</form>

</body>

</html>
<?php

#	if($_SERVER['REQUEST_METHOD'] == "POST") {
#	$gameid = $_POST['game'];

#	header("Location: result.php?check=$playid");
#	die;
#	}

?>