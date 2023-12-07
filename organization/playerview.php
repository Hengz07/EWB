<?php

  session_start();
    include('../private/connection.php');
    include('function.php');

    $user_data = check_login($con);
    $id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Result</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../private/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  </head>

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
            float: right;
        }

        .aa:hover{
            background: black;
            border: 1px solid rgba(222, 224, 121);
            color: white;
        }
    </style>

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

   <?php
    $sc = "select * from game_player where id='$id'";
    $scq = mysqli_query($con,$sc);
    $infod = mysqli_fetch_assoc($scq);
    extract($infod);
   ?>

    <a class="aa" id="print-btn" href="gamerecordpdf.php?viewfullrecord=<?php echo $scBoard['play_id']; ?>">print</a>
    
    <style>
      .container table{
        border: 2px solid black;
        border-collapse: collapse;
      }
      .container th{
        background-color: lightgray;
      }
      .container tr:nth-child(even){
        background-color: white;
      }
    </style>

    <center>
    <div class="animate__animated animate__bounceIn form" style=" font-weight:bold; width:60%; height:auto; box-shadow: 10px 10px rgba(0,0,0,0.3);">
      <div class="container" style="padding:1em;">
        <form action="record.php" method="post">
          <h2>Full Result Player</h2>
          <br>

          <center>
          <table class="animate__animated animate__fadeInDown">
            <tr>
              <th colspan="4">Player Info</th>
            </tr>
            <tr>
              <td style="padding: 0.4em; text-align: right;">Full Name:</td>
              <td style="padding: 0.4em;" colspan="3"><?php echo $fullname; ?></td>
            </tr>
            <tr>
              <td style="padding: 0.4em; text-align: right;">Username:</td>
              <td style="padding: 0.4em;"><?php echo $username; ?></td>
              <td style="padding: 0.4em; text-align: right;">Email:</td>
              <td style="padding: 0.4em;"><?php echo $email; ?></td>
            </tr>
            <tr>
              <td style="padding: 0.4em; text-align: right;">Phone Number:</td>
              <td style="padding: 0.4em;"><?php echo $pnum; ?></td>
              <td style="padding: 0.4em; text-align: right;">IC/ID:</td>
              <td style="padding: 0.4em;"><?php echo $uic; ?></td>
            </tr>
            <tr>
              <td style="padding: 0.4em; text-align: right;">Address:</td>
              <td style="padding: 0.4em;" colspan="3"><?php echo $address; ?></td>
            </tr>
          </table><br>

          <table class="animate__animated animate__fadeInDown animate__delay-1s">
            <tr>
              <th colspan="2">Marshal Info</th>
            </tr>
            <?php
              $marshal = "select * from marshal where mar_id = '$marshal'";
              $marq = mysqli_query($con,$marshal);
              if(mysqli_num_rows($marq) == 0){
                echo "<tr><td colspan='2' style='text-align: center;'> (Not Set) </td></tr>";
              }else{
                $mardata = mysqli_fetch_assoc($marq);
            ?>
            <tr>
              <td style="padding: 0.4em; text-align: right;">Marshal Name:</td>
              <td style="padding: 0.4em;"><?php echo $mardata['marname']; ?></td>
            </tr>
            <tr>
              <td style="padding: 0.4em; text-align: right;">Phone Number:</td>
              <td style="padding: 0.4em;"><?php echo $mardata['marpnum']; ?></td>
            </tr>
          <?php } ?>
          </table>
        </center>

          <br>
          <center>
          <table class="animate__animated animate__fadeInDown animate__delay-1s" border="2" style=" padding:1em; width: 100%; text-align: center;">
            <tr>
              <th>Gate</th>
              <th>Par</th>
              <th>OB</th>
              <th>Point</th>
              <th>Status</th>
            </tr>
            <?php

            $bil=1;
            $sql = "select * from game_score where play_id='$id' order by gate asc";
            $result = mysqli_query($con,$sql);
            $total = 0;

            if(mysqli_num_rows($result) == 0){
              echo "<tr><td colspan='5'> (Not Started) </td></tr>";
            }else{
              while ($data = mysqli_fetch_array($result))
              {
                  extract($data);
                  $total = $total + $point;


              ?>
              <tr>
              <td style="padding: 1em;"> <?php echo $gate;?> </td>
              <td style="padding: 1em;"> <?php echo $par;?> </td>
              <td style="padding: 1em;"> <?php echo $ob;?> </td>
              <td style="padding: 1em;"> <?php echo $point;?> </td>
              <td style="padding: 1em;"> 
                <?php
                 
                  if ($point == 1) {
                    echo "Gate In One";
                  }
                  else if ($par == 4 && $point == 2) {
                    echo "Eagle";
                  }
                  else if ($par == 5 && $point == 3) {
                    echo "Eagle";
                  }
                  else if ($point < $par && $point > 0) {
                    echo "Birdee";
                  }
                  else if ($point == $par) {
                    echo "Par";
                  }
                  else if ($point == 0) {
                    echo "Invalid";
                  }
                  else if ($point == $par*3) {
                    echo "Max Point";
                  }
                  else {
                    echo "~";
                  }

                ?> 
              </td>
              </tr>
              <?php
              }}
              ?>


          </table>
          <br>
          <table class="animate__animated animate__fadeInUp animate__delay-1s" border="1" style="border: solid black; width: 30%; text-align: center;">
            <tr>
              <td style="background-color: white;">Total Points: </td>
              <td style=" padding:5px; background-color: white;"><?php echo $total;?></td>
            </tr>
          </table>
          </center>
          <br><br>
        </form>
        <button class="animate__animated animate__bounceInUp animate__delay-1s" onclick="history.back()" id="print-btn">Back</button>
    </div>
  </div>
</center>
  </body>
</html>
