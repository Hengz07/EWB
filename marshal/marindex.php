<?php

session_start();
include('../private/connection.php');
include('function.php');

$mar_data = check_login($con);
$id = $_SESSION['mar_id'];

$sql = "select * from marshal where mar_id = '$id'";
$query = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($query);
$game_id = $data['game_id'];

$game = "select * from game where game_id = '$game_id'";
$gquery = mysqli_query($con, $game);
$gdata = mysqli_fetch_assoc($gquery);
$fieldname = $gdata['fieldName'];
$gameName = $gdata['game_name'];
$gameDate = $gdata['game_date'];

$field = "select * from field where f_name = '$fieldname'";
$fquery = mysqli_query($con, $field);
$fdata = mysqli_fetch_assoc($fquery);
$fgate = $fdata['f_gate'];
$fpar = $fdata['fpar'];



?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="../private/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Marshal</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>

	<nav>
		<div class="logo">
			<h6>E-Woodball Marshal</h6>
		</div>
		<input type="checkbox" id="click">
		<label for="click" class="menu-btn">
			<i class="fas fa-bars"></i>
		</label>
		<ul>
		</ul>
	</nav>

	<form action="marresult.php" method="POST">
		<div class="form animate__animated animate__bounceIn" style="box-shadow: 10px 10px rgba(0,0,0,0.3);">
			<h1>Woodball Marshal</h1>
			<br>
			<h3>Game Date: <?php echo date('d M Y', strtotime($gameDate)); ?></h3>
			<h3><?php echo $gameName . " (" . $fieldname . ")"; ?></h3>
			<br />
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

				.marsh a {
					max-width: calc(100% / 4 - 15px);
				}
			</style>

			<center>
				<div class="marsh">
					<?php

					$i = 1;

					while ($i <= $fgate) {
					?>
						<a class="aa" href="margame.php?game=<?php echo $game_id . '&gate=' . $i; ?>" onclick="return confirm('Are You Sure You Want To Start Gate <?php echo $i; ?> ?')"> Gate <?php echo $i; ?></a>
					<?php
						$i++;
					}

					?>
				</div>
			</center>

			<br>
			<br>
			<input type="hidden" name="game" value="<?php echo $data['game_id']; ?>">
			<button class="animate__animated animate__bounceInUp" style="box-shadow: 10px 10px rgba(0,0,0,0.3);" type="submit" name="start"><b>Result</b></button>
		</div>

	</form>

</body>

</html>