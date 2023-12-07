<?php

	session_start();
		include('../private/connection.php');
		include('function.php');

		$org_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Organizer</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../private/style.css">
	<link rel="stylesheet" type="text/css" href="print.css" media="Print">
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
        }

        .aa:hover{
            background: black;
            border: 1px solid rgba(222, 224, 121);
            color: white;
        }
		.tabling table{
			text-align: center;
			border-collapse: collapse;
			border: 2px solid black;
		}
		.tabling th{
			background-color: lightgray;
		}
		.tabling tr:nth-child(even){
			background-color: white;
		}
    </style>

    


	<div style="width:60%; box-shadow: 10px 10px rgba(0,0,0,0.3); border:2px solid black; padding:20px;text-align:center;overflow:hidden;margin:5%auto;border-radius:10px;">

		<h3>Game Result</h3>
		<br>
		<center>
	<div class="tabling">
		<table border="1" align="center" width="100%" >
				<tr>
				<th>No</th>
				<th>Game Date</th>
				<th>Game Name</th>
				<th>winner</th>
				<th>Point</th>
				<th>Action</th>
				</tr>
				<?php

				$bil=1;
				$selectGame= "select *  from game where org_id ='".$_SESSION['id']."'";
				$resultGame = mysqli_query($con, $selectGame);
				while ($gameList = mysqli_fetch_array($resultGame)) {

				$scBoardSql = "select play_id, sum(point) as total_point  from game_score where game_id='".$gameList['game_id']."' group by play_id order by sum(point) asc limit 1";
				$scBoardResult = mysqli_query($con,$scBoardSql);

				if(mysqli_num_rows($scBoardResult)> 0){
				$scBoard = mysqli_fetch_assoc($scBoardResult);

				$gplayer = "select * from game_player where id='".$scBoard['play_id']."'";
				$gpquery = mysqli_query($con,$gplayer);
				$player = mysqli_fetch_assoc($gpquery);
				}
				else{
					$player['playername']="";
					$scBoard['total_point']="";
				}
			?>

				<td> <?php echo $bil;?> </td>
				<td> <?php echo date('d-m-Y',strtotime($gameList['game_date']));?> </td>
				<td> <?php echo $gameList['game_name'];?> </td>
				<td> <?php echo $player['playername'];?> </td>
				<td> <?php echo $scBoard['total_point'];?> </td>
				<td>
					<center>
						<?php if(mysqli_num_rows($scBoardResult)> 0){ ?>
						<a style="background-color: rgba(16, 15, 15, 0.7); color:white;" class="bb" id="print-btn" href="playergroup.php?viewgroup=<?php echo $gameList['game_id']; ?>">View</a> <?php } ?>
						<a style="background-color: rgba(16, 15, 15, 0.7); color:white;"class="bb" id="print-btn" href="deletedata.php?Delete=<?php echo $gameList['game_id']; ?>" onclick="return confirm('Are You Sure You Want To Delete?')">Delete</a>
					</center>
				</td>
				</tr>

				<?php
				$bil++;
				}
				?>
			</table>
		</center>
		<br>
		<button onclick="history.back()" id="print-btn" style="box-shadow: 10px 10px rgba(0,0,0,0.3);">Back</button>
	</div>
	</div>

</body>
</html>
