<?php

  session_start();
    include('../private/connection.php');
    include('function.php');

    $user_data = check_login($con);

    $g1= "select * from field";
    $g2 = mysqli_query($con,$g1) or die(mysqli_error($con));
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Field</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../private/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  </head>

  <style>
    .form{
      box-shadow: 10px 10px rgba(0,0,0,0.3);
    }
    #link{
      padding: 10px;
    }
  </style>

  <body>

    <nav>
     <div class="logo">
      <h6>PSWoodball Player</h6>
     </div>
     <input type="checkbox" id="click">
     <label for="click" class="menu-btn">
     <i class="fas fa-bars"></i>
     </label>
     <ul>
      <li><a href="uindex.php">Home</a></li>
      <li><a href="profile.php">Update Profile</a></li>
      <li><a href="ulogout.php">Logout</a></li>
     </ul>
  </nav>

    <center>
    <div class="form animate__animated animate__bounceIn">
      <div class="container">
        <form action="uindex.php" method="post">
          <h2>Select Field</h2>
          <br>
      <center>
          <form class="" action="index.html" method="post">

      		<?php

      		$bil=1;

      		while ($g3 = mysqli_fetch_array($g2))
      		{
      				extract($g3);

      		?>
      		<a class="animate__animated animate__fadeInUp" id="link" href="reggame.php?field=<?php echo $fpar;?>" onclick="return confirm('Are You Sure You Want To Start <?php echo $f_name; ?> Field ?')"><b><?php echo $f_name?></b></a>
      		

      		<?php
      		}
      		?>
  		</center>

        </form>
    </div>
  </div>
</center>
  </body>
</html>
