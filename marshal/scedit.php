<?php

session_start();
include('../private/connection.php');
include('function.php');

$mar_data = check_login($con);
$gate = $_GET['gate'];
$id = $_GET['id'];

$sql = "select * from game_score where play_id='$id' and gate='$gate'";
$query = mysqli_query($con,$sql);
$data = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../private/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marshal</title>
</head>
<body>

<nav>
		 <div class="logo">
			<h6>PSWoodball Marshal</h6>
		 </div>
		 <input type="checkbox" id="click">
		 <label for="click" class="menu-btn">
		 <i class="fas fa-bars"></i>
		 </label>
		 <ul>
		 </ul>
	</nav>

	<style type="text/css">
		input{
            border-radius: 10px;
            width: 40%;
            text-align: center;
            border: 2px solid rgba(224, 211, 121);
            padding: 5px;
            font-size: 1em;
        }
	</style>

    <form action="" method="POST">
		<div class="form" style="box-shadow: 10px 10px rgba(0,0,0,0.3);">
			<h1>Marshal Edit</h1>
            <br>
            <label><b>Point</b></label><br>
            <input type="number" name="point" value="<?php echo $data['point']; ?>"><br><br>
            <label><b>OB</b></label><br>
            <input type="number" name="ob" value="<?php echo $data['ob']; ?>"><br><br>

			<button style="box-shadow: 10px 10px rgba(0,0,0,0.3);" type="submit" name="start"><b>Update</b></button>
        </div>

	</form>

</body>
</html>
<?php
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$point = $_POST['point'];
		$ob = $_POST['ob'];

		if (!empty($point) && !empty($ob)) {
			$updates = "update game_score set point='$point', ob='$ob' where play_id='$id' and gate='$gate'";
			$upquery = mysqli_query($con,$updates);

			header("Location: marresult.php");
			die;
		}
	}
?>