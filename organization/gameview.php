<?php

session_start();
include '../private/connection.php';
include 'function.php';

$org_data = check_login($con);
$gid = $_GET['game_id'];


?>
<!DOCTYPE html>
<html>

<head>
	<title>Game Dashboard</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../private/style.css">
	<link rel="stylesheet" type="text/css" href="print.css" media="Print">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
			<li><a href="marcord.php">Marshal</a></li>
			<li><a class="active" href="gamecord.php">Game</a></li>
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
		}

		.aa:hover {
			background: black;
			border: 1px solid rgba(222, 224, 121);
			color: white;
		}

		.container {
			font-weight: bold;
		}

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

	<?php

	$ccrt = "select p.id,p.address, s.play_id, sum(s.point) as pts from game_score as s join game_player as p on p.id = s.play_id and p.game_code = '$gid' GROUP by address";
	$qccrt = mysqli_query($con, $ccrt);

	foreach ($qccrt as $info1) {
		// code...
		$addname[] = $info1['address'];
		$addpts[] = $info1['pts'];
	}

	$pcrt = "select p.*, s.play_id, sum(s.point) as pts from game_score as s join game_player as p on p.id = s.play_id and p.game_code = '$gid' group by id order by pts asc limit 3";
	$qpcrt = mysqli_query($con, $pcrt);

	foreach ($qpcrt as $info) {
		// code...
		$name[] = $info['username'];
		$point[] = $info['pts'];
	}

	$dccrt = mysqli_fetch_row($qccrt);
	$dpcrt = mysqli_num_rows($qpcrt);

	if ($dccrt > 1 || $dpcrt > 1) {
		// code...

	?>

		<div class="animate__animated animate__fadeInDown" style="width:75%; box-shadow: 10px 10px rgba(0,0,0,0.3); border:2px solid black; padding:20px;text-align:center;overflow:hidden;margin:1%auto;border-radius:10px;display: flex; height: 400px; vertical-align: middle;">
			<div style="width:50%; background:white; border: 2px solid black; ">
				<canvas style="display: unset; height:300px;" id="clubChart"></canvas>
			</div>
			<div style="width:50%; background:white; border:2px solid black;">
				<p>Top Player Chart</p>
				<canvas style="height: fit-content; margin-top: 2rem;" id="playerChart"></canvas>
			</div>
		</div>

	<?php } ?>

	<div class="animate__animated animate__bounceIn" style="width:75%; box-shadow: 10px 10px rgba(0,0,0,0.3); border:2px solid black; padding:20px;text-align:center;overflow:hidden;margin:2%auto;border-radius:10px;">

		<h2>Player Record</h2>
		<div class="container">
			<center>
				<table border="1" width="100%">
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Total Point</th>
						<th>Marshal</th>
						<th>Status</th>
						<th>Detail</th>
					</tr>

					<?php

					$query = "select * from game_player where game_code = '$gid'"; //baru sini edit
					$result = mysqli_query($con, $query);
					$no = 1;

					while ($row = mysqli_fetch_array($result)) {
						$player = $row['id'];
						$gate = "select field.*,game.* from field inner join game on field.f_name = game.fieldName where game_id = '$gid'";
						$qgate = mysqli_query($con, $gate);
						$dgate = mysqli_fetch_assoc($qgate);

						$status = "select count(gate) as billgate from game_score where game_id = '$gid' and play_id = '$player'";
						$statusq = mysqli_query($con, $status);
						$statusd = mysqli_fetch_assoc($statusq);
					?>
						<tr>
							<td style="text-align:center;"><?php echo $no++; ?></td>
							<td style="text-align:center;">
								<?php
								echo $row['username'];
								if ($statusd['billgate'] == $dgate['f_gate'] && $no == 2) {
									echo " - Winner";
								} else if ($statusd['billgate'] == $dgate['f_gate'] && $no == 3) {
									echo " - Second";
								}
								?>
							</td>
							<td style="text-align:center;">
								<?php
								$kira = "select sum(point) as 'hasil' from game_score where game_id = '$gid' and play_id = '$player'";
								$kiraq = mysqli_query($con, $kira);
								$kirad = mysqli_fetch_assoc($kiraq);
								if ($kirad['hasil'] == 0) {
									echo "0";
								} else {
									echo $kirad['hasil'];
								}
								?>
							</td>
							<td style="text-align:center;">
								<?php
								$marshal = "select marshal.*,game_player.* from marshal inner join game_player on marshal.mar_id = game_player.marshal where id = '$player'";
								$qmarshal = mysqli_query($con, $marshal);
								#$dmar = mysqli_fetch_assoc($qmarshal);
								if (mysqli_num_rows($qmarshal) == 0) {
									echo "~";
								} else {
									$dmar = mysqli_fetch_assoc($qmarshal);
									echo $dmar['marname'];
								}
								?>
							</td>
							<td style="text-align:center;">
								<?php

								if ($statusd['billgate'] == 0) {
									echo "Not Started";
								} else if ($statusd['billgate'] == $dgate['f_gate']) {
									echo "Finished";
								} else {
									echo "Ongoing";
								}
								?>
							</td>
							<td style="text-align:center;">
								<form action="usr.php" method="post">
									<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />

									<center>
										<a style=" margin:0.2em; width:90%; padding:0.5em;" href="playerview.php?id=<?php echo $row['id']; ?>" id="print-btn">View</a>

										<a onclick="return confirm('Confirm Delete This Player?');" style=" margin:0.2em; width:90%; padding:0.5em;" href="<?php echo "playerdelete.php?id=" . $row['id'] . "&gid=" . $gid ?>" id="print-btn">Delete</a>
									</center>
								</form>
							</td>
						</tr>
					<?php
					}
					?>
				</table>
			</center>
		</div>
		<button class="animate__animated animate__bounceInUp" onclick="history.back()" id="print-btn" style="box-shadow: 10px 10px rgba(0,0,0,0.3);">Back</button>
	</div>
	</div>

</body>

<script>
	const ccrt = document.getElementById('clubChart');

	const pcrt = document.getElementById('playerChart');
	const pnama = <?php echo json_encode($name); ?>;

	new Chart(ccrt, {
		type: 'polarArea',
		data: {
			labels: <?php echo json_encode($addname); ?>,
			datasets: [{
				label: 'Overall Total',
				data: <?php echo json_encode($addpts); ?>,
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				y: {
					beginAtZero: true
				}
			}
		}
	});

	new Chart(pcrt, {
		type: 'bar',
		data: {
			labels: pnama,
			datasets: [{
				label: 'Player Points',
				data: <?php echo json_encode($point); ?>,
				borderWidth: 1,
				backgroundColor: [
					'green', 'red', 'blue'
				]
			}]
		},
		options: {
			scales: {
				y: {
					beginAtZero: true
				}
			}
		}
	});
</script>

</html>