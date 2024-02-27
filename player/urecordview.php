<?php

session_start();
include('../private/connection.php');
include('function.php');

$user_data = check_login($con);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Result</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../private/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<style>
  @media(max-width:424px) {

    .prepare table,
    tr,
    td {
      border-collapse: collapse;
      margin-right: 1em;
    }

    .container {
      margin-right: 1em;
    }
  }

  .prepare table,
  tr,
  td {
    padding: 10px;
    border-collapse: collapse;
  }

  .prepare th {
    background-color: lightgray;
    padding: 10px;
  }

  .prepare tr:nth-child(even) {
    background-color: white;
  }
</style>

<body>

  <nav>
    <div class="logo">
      <h6>E-Woodball Player</h6>
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
        <form action="record.php" method="post">
          <h2>Result</h2>
          <br>
          <center>
            <div class="prepare">
              <table class="animate__animated animate__fadeInUp" border="1" style="border: solid black;  text-align: center; margin-left:-2em;">
                <tr>
                  <th>Gate</th>
                  <th>Par</th>
                  <th>OB</th>
                  <th>Points</th>
                  <th>Status</th>
                </tr>
            </div>
            <?php

            $bil = 1;
            $id = $_GET['viewrecord'];
            $sql = "select * from single_score where player_id='$id' order by gate_number asc";
            $result = mysqli_query($con, $sql);
            $total = 0;
            while ($data = mysqli_fetch_array($result)) {
              extract($data);
              $total = $total + $point;


            ?>
              <tr>
                <td> <?php echo $gate_number; ?> </td>
                <td> <?php echo $par; ?> </td>
                <td> <?php echo $ob; ?> </td>
                <td> <?php echo $point; ?> </td>
                <td>
                  <?php
                  if ($point == 1) {
                    echo "Gate In One";
                  } else if ($par == 4 && $point == 2) {
                    echo "Eagle";
                  } else if ($par == 5 && $point == 3) {
                    echo "Eagle";
                  } else if ($point < $par && $point > 0) {
                    echo "Birdee";
                  } else if ($point == $par) {
                    echo "Par";
                  } else if ($point == 0) {
                    echo "Invalid";
                  } else if ($point == $par * 3) {
                    echo "Max Point";
                  } else {
                    echo "~";
                  }
                  ?>
                </td>
              </tr>
            <?php
            }
            ?>


            </table>
            <br>
            <table class="animate__animated animate__fadeInUp" border="1" style="border: solid black; width: 30%; text-align: center; background-color:white">
              <tr>
                <td>Total Points: </td>
                <td><?php echo $total; ?></td>
              </tr>
            </table>
          </center>
          <br><br>
        </form>
        <button class="animate__animated animate__bounceInUp" onclick="history.back()" id="print-btn">Back</button>
      </div>
    </div>
  </center>
</body>

</html>