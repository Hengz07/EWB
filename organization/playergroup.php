<?php

	session_start();
		include('../private/connection.php');
		include('function.php');

		$org_data = check_login($con);

		$g1= "select * from singel_score";
	//	$g2 = mysqli_query($con,$g1) or die(mysqli_error($con));
?>

<!DOCTYPE html>
<html>
<head>
	<title>Organizer</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../private/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<style type="text/css">
			.bb{
					display: inline-block;
					border-radius: 10px;
					background: yellow;
					border: 1px solid;
					color: black;
					padding: 5px;
					width: 90%;
					margin-top: 5px;
					font-size:1em;
					text-align: center;
					text-decoration: none;
			}

			.bb:hover{
					background: black;
					border: 1px solid rgba(222, 224, 121);
					color: white;
			}

			input{
					border-radius: 10px;
					width: 80%;
					text-align: center;
					border: 2px solid rgba(224, 211, 121);
					padding: 5px;
					font-size: 1em;
			}

			.aa{
					display: inline-block;
					border-radius: 10px;
					background: blue;
					border: 1px solid;
					color: white;
					padding: 5px;
					width: 5%;
					margin-top: 5px;
					margin-right: 15%;
					font-size:1em;
					text-align: center;
					text-decoration: none;
					float: right;
			}

			.aa:hover{
					background: black;
					border: 1px solid rgba(222, 224, 121);
					color: white;
			}
	</style>

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

	<?php
	$selectGame= "select *  from game where org_id ='".$_SESSION['id']."'";
	$resultGame = mysqli_query($con, $selectGame);
	$gameList = mysqli_fetch_array($resultGame)
	 ?>

	<a class="aa"  href="grouppdf.php?priintgroup=<?php echo $gameList['game_id'];?>" target="_blank" id="print-btn">Print</a>

	<style>
		.ok table{
			border-collapse: collapse;
			text-align: center;
			border: 2px solid black;
		}
		.ok th{
			background-color: lightgray;
		}
	</style>

	<div style=" box-shadow: 10px 10px rgba(0,0,0,0.3); position:relative; width:90%; height:90%; border:2px solid black;padding:20px;text-align:center;overflow:hidden;margin:5%auto;border-radius:10px;">

		<h2>Group player</h2><br>
		<div class="ok" style="  position:absolute; top:16%; right: 10%; width:40%; height:300px;">
			<center>
			<table border="1" align="center" width="100%">
					<tr>
					<th>No</th>
					<th>name</th>
					<th>Point</th>
					<th>Action</th>
					</tr>
					<?php

					$bil=1;
					$scBoardSql = "select play_id, sum(point) as total_point from game_score where game_id='".$_GET['viewgroup']."' group by play_id";
					$scBoardResult = mysqli_query($con,$scBoardSql);
					$players="[";
					$point="[";

					while($scBoard = mysqli_fetch_array($scBoardResult)) {

						$gplayer = "select * from game_player where id='".$scBoard['play_id']."'";
						$gpquery = mysqli_query($con,$gplayer);
						$player = mysqli_fetch_assoc($gpquery);

					if($bil==1){
					$players.="'".$player['playername']."'";
					$point.="'".$scBoard['total_point']."'";
					}
					else{
					$players.=",'".$player['playername']."'";
					$point.=",'".$scBoard['total_point']."'";
					}

					?>
					<td> <?php echo $bil;?> </td>
					<td> <?php echo $player['playername'];?> </td>
					<td> <?php echo $scBoard['total_point'];?> </td>
					<td>
						<center>
							<?php if(mysqli_num_rows($gpquery)> 0){ ?>
							<a style="background-color: rgba(16, 15, 15, 0.7); color:white;" class="bb" id="print-btn" href="gamerecordview.php?viewrecord=<?php echo $scBoard['play_id']; ?>">View</a> <?php } ?>
						</center>
					</td>
					</tr>

					<?php
					$bil++;
					}
					$players.="]";
					$point.="]";

					?>
				</table>
			</center>
		</div>

		<div style="width:50%;">
			<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js">
			</script>
			<canvas id="myChart" style="width:50%;max-width:600px;background:white"></canvas>
			<script>
					var xValues = <?php echo $players; ?>;
					var yValues = <?php echo $point; ?>;
					var barColors = ["brown","green","blue","pink","red","oren"];

					new Chart("myChart", {
					  type: "bar",
					  data: {
					    labels: xValues,
					    datasets: [{
					      backgroundColor: barColors,
					      data: yValues
					    }]
					  },
					  options: {
					    legend: {display: false},
					    title: {
					      display: true,
					      text: "Player Score"
					    },
						scales: {
						yAxes: [{ticks: {min: 0}}],
						}
					  }
					});
			</script>
		</div>
		<br><br><button style="box-shadow: 10px 10px rgba(0,0,0,0.3);" onclick="history.back()">Back</button>
	</div>

</body>
</html>
