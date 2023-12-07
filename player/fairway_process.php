<?php
	session_start();
		include("../private/connection.php");
		include("function.php");
		
		if(isset($_POST['submit']))
		{
			$userId=$_SESSION['id'];
			$gameDate=date('Y-m-d');
			$fairway=$_POST['numfair'];
			
			$query = "insert into singel_palyer (user_id,game_date,fairway) values ('$userId','$gameDate','$fairway')";
			$insertFairway = mysqli_query($con, $query);
			
			if ($insertFairway === TRUE) {
				
				$queryid = "select * from singel_palyer order by id DESC limit 1";
				$resultId = mysqli_query($con, $queryid);
				$playerSingelGameId = mysqli_fetch_assoc($resultId);
				
				header("Location: upar.php?check=".$playerSingelGameId['id']);
				
				echo "<pre>";
				print_r($playerSingelGameId);
				echo "</pre>"; 
				
			} else {
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}
			
			
			
			
		}
?>