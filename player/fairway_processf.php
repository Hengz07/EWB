<?php
	session_start();
		include("../private/connection.php");
		include("function.php");

		$id_f = $_GET['selectfield'];
		$query = "select * from field where f_id ='$id_f'";
		$g2 = mysqli_query($con,$query) or die(mysqli_error($con));
		while ($g3 = mysqli_fetch_array($g2))
		{
				extract($g3);
		}
			$userId=$_SESSION['id'];
			$gameDate=date('Y-m-d');
			$fairway=$f_gate;

			$query2 = "insert into single_player (user_id,game_date,fairway) values ('$userId','$gameDate','$fairway')";
			$insertFairway = mysqli_query($con, $query2);

			if ($insertFairway === TRUE) {

				$queryid = "select * from single_player order by id DESC limit 1";
				$resultId = mysqli_query($con, $queryid);
				$playerSingelGameId = mysqli_fetch_assoc($resultId);

				header("Location: upar.php?check=".$playerSingelGameId['id']);

				echo "<pre>";
				print_r($playerSingelGameId);
				echo "</pre>";

			} else {
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}

?>
