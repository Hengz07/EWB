<?php
		include("../private/connection.php");
		
		if(isset($_POST['submit']))
		{
			
			/* echo "<pre>";
			print_r($_POST);
			echo "</pre>";
			die; */
			$gate=$_POST['stgate'];
			$par=$_POST['par'];
			$singlePlayerId=$_POST['singlePlayerId'];
			
			$query = "insert into quickplay (qid,gate,par) values ('$singlePlayerId','$gate','$par')";
			$insertGate = mysqli_query($con, $query);
			
			if ($insertGate === TRUE) {
				
				$queryid = "select * from quickplay order by pid DESC limit 1";
				$resultId = mysqli_query($con, $queryid);
				$gateId = mysqli_fetch_assoc($resultId);
				
				header("Location: score.php?check=".$gateId['pid']."&g=".$gate);
			} else {
			  echo "Error: " ;
			}
			
			
			
			
		}
?>