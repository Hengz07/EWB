<?php
	session_start();
		include("../private/connection.php");
		include("function.php");
		
		if(isset($_POST['submit']))
		{
			
			 
			$userId=$_SESSION['id'];
			$point=$_POST['point'];
			if($_POST['ob']=="" || $_POST['ob']<0 ){
				$ob=0;
			}
			else{
				$ob=$_POST['ob'];
			}
			
			
			$singlescoreId=$_POST['singleScoreId'];
			$singlePlayerId=$_POST['singlePlayerId'];
			
			$query = "UPDATE single_score set point=$point, ob=$ob where single_id = $singlescoreId";
			$updateScore = mysqli_query($con, $query);
			
			if ($updateScore === TRUE) {
				
				$querySinglePlayer = "select * from single_player where id = $singlePlayerId limit 1";
				$resultSinglePlayer = mysqli_query($con, $querySinglePlayer);
				$singlePlayer = mysqli_fetch_assoc($resultSinglePlayer);
				
				$queryScore= "select * from single_score where player_id = $singlePlayerId ";
				$resultScore = mysqli_query($con, $queryScore);
				//$Score = mysqli_fetch_all($resultScore);
		
				
				if(mysqli_num_rows($resultScore) == $singlePlayer['fairway']){
					
				header("Location: result.php?check=".$singlePlayerId);
					
				}
				else{
					
				$queryid = "select * from single_score where single_id =$singlescoreId limit 1";
				
				$resultId = mysqli_query($con, $queryid);
				$gateId = mysqli_fetch_assoc($resultId);
				
				header("Location: upar.php?check=".$gateId['player_id']);
				} 
			
			
			}
			else {
			  echo "Error: " ;
			}
			
		}
?>