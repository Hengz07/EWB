<!DOCTYPE html>
<html>
<head>
	<title>Organizer</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../private/style.css">
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
			<li><a href="gamecord.php">Game</a></li>
			<li><a class="active" href="fieldcord.php">Field</a></li>
			<li><a href="oindex.php">Home</a></li>
			<li><a href="profile.php">Update Profile</a></li>
			<li><a href="orlogout.php">Logout</a></li>
		 </ul>
	</nav>
	<br>
	
	<form action="" method="POST">
		<div class="form" style="box-shadow: 10px 10px rgba(0,0,0,0.3);">
			<h1>Par</h1>
			<?php
				session_start();
				include("../private/connection.php");
				include("function.php");

				$org_data = check_login($con);

				$par_id = $_GET['id'];

				$sql = "select * from field where fpar = '$par_id'";
				$query = mysqli_query($con, $sql);
				$data = mysqli_fetch_assoc($query);
				extract($data);

				for($i=1; $i<=$f_gate; $i++){

			?>
			<div>
				<br>
				<label for="par"><b>Par <?php echo $i; ?></b></label><br>
				<input type="number" placeholder="Enter Par" name="<?php echo $i.'par'; ?>" id="par" required>
				<input type="hidden" name="fgate" value="<?php echo $f_gate; ?>">
				<br><br>
			<?php } ?>
			</div>
			<br>
			<!--button ni klau dh siap database kita setup balik-->
			<button style="box-shadow: 10px 10px rgba(0,0,0,0.3);" type="submit"><b>Create</b></button>
		</div>
	</form>
	<?php
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$gate = $_POST['fgate'];

		$id = "insert into field_par (fpar) values ('$par_id')";
		mysqli_query($con, $id);
		
		for($i=1; $i<=$gate; $i++){
			
			$par = $_POST[$i.'par'];

			if(!empty($par)){
				
				$sql = "update field_par set gate$i ='$par' where fpar = '$par_id'";
				mysqli_query($con, $sql);

				header("Location: recordfield.php");

			}
			else{
				echo "Please insert betul betul la!";
			}
		}
	}
	?>
</center>


</body>
</html>