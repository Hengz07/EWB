<?php
	session_start();
		include("../private/connection.php");
		include("function.php");
		
		if(isset($_POST['submit']))
		{
			
			/* echo "<pre>";
			print_r($_POST);
			echo "</pre>";
			die; */
			$userId=$_SESSION['id'];
			$gate=$_POST['stgate'];
			$par=$_POST['par'];
			$singlePlayerId=$_POST['singlePlayerId'];
			
			$query = "insert into single_score (player_id,gate_number,par) values ('$singlePlayerId','$gate','$par')";
			$insertGate = mysqli_query($con, $query);
			
			if ($insertGate === TRUE) {
				
				$queryid = "select * from single_score order by single_id DESC limit 1";
				$resultId = mysqli_query($con, $queryid);
				$gateId = mysqli_fetch_assoc($resultId);
				
				header("Location: ucount.php?check=".$gateId['single_id']."&g=".$gate);
			} else {
			  echo "Error: " ;
			}
			
			
			
			
		}
?>