<?php

	session_start();
		include('../private/connection.php');
		include('function.php');

		$org_data = check_login($con);

		$g1 = "select * from singel_score";
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


			.aa{
					background: white;
					border: 1px solid;
					color: blue;
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
<center>
<nav>
	 <div style="color:white;">
		<h1>Woodball Organizer</h1>
	 </div>
</nav>
<br>

	<br>
		<h3>group player data</h3>

			<button class="aa" onclick="window.print()" id="print-btn">Print</button>
		<div style="margin: 3% ; width:35%; hight:300px;">
			<center>
			<table border="1" align="center" width="100%">
					<tr>
					<th>No</th>
					<th>name</th>
					<th>Point</th>
					</tr>
					<?php

					$bil=1;
					$scBoardSql = "select play_id, sum(point) as total_point from game_score where game_id='".$_GET['priintgroup']."' group by play_id";
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
</center>
</body>
</html>
