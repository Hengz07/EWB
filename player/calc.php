<?php
	session_start();
		include("../private/connection.php");
		include("function.php");
		
		if(isset($_POST['submit']))
		{
			
			 
			$userId=$_SESSION['id'];
			$point=$_POST['point'];
			$fid=$_POST['fid'];
			$game = $_POST['game'];
			if($_POST['ob']=="" || $_POST['ob']<0 ){
				$ob=0;
			}
			else{
				$ob=$_POST['ob'];
			}

			
			$gate = $_POST['gate'];
			$singlePlayerId=$_POST['singlePlayerId'];
			
			$query = "update single_score set point='$point', ob='$ob' where player_id = '$singlePlayerId' and gate_number = '$gate'";
			$updateScore = mysqli_query($con, $query);
			
			header("Location: game.php?id=$game&field=$fid");
			
		}
?>