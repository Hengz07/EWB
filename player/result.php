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
  <link rel="stylesheet" href="player.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<style>
  .form {
    width: 50%;
  }

  @media screen and (max-width:424px) {
    .form {
      margin: 1em;
      padding: 15px;
      width: auto;
    }

    .container table,
    td,
    tr {
      border-collapse: collapse;
      padding: 1.5em;
      margin-inline: -1.5em;
    }
  }

  @media screen and (max-width:820px) {
    .form {
      margin: 1em;
      padding: 15px;
      width: auto;
    }

  }

  .container table,
  td,
  tr {
    border-collapse: collapse;
    padding: 1.5em;
    margin-inline: -1.5em;
  }

  .container tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  .container th {
    background-color: lightgray;
  }

  #back {
    border-radius: 10px;
    background-color: rgba(16, 15, 15, 0.7);
    color: white;
    border: 2px solid;
    padding: 0.7em;
    width: 10em;
    margin-top: 5px;
    font-size: 1em;
    text-align: center;
    text-decoration: none;
    display: inline-block;
  }

  #back:hover {
    color: white;
    background: black;
    border: 2px solid rgba(222, 224, 121);
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
        <form action="fresult.php" method="post">
          <h2>Result</h2>
          <br>
          <center>
            <table class="animate__animated animate__fadeInUp" border="1" style="border: solid black; width: 70%; text-align: center;">
              <tr>
                <th>Gate</th>
                <th>Par</th>
                <th>OB</th>
                <th>Point</th>
                <th>Status</th>
              </tr>
              <?php

              $bil = 1;
              $id = $_GET['check'];
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
            <table class="animate__animated animate__fadeInUp" border="1" style="border: solid black; width: 30%; text-align: center; background-color:#f2f2f2">
              <tr>
                <td>Total Points: </td>
                <td><?php echo $total; ?><input type="hidden" name="totals" value="<?php echo $total; ?>"><input type="hidden" name="ids" value="<?php echo $id; ?>"></td>
              </tr>
            </table>
          </center>
          <a class="animate__animated animate__bounceInLeft" id="back" onclick="history.back()">Back</a>
          <button class="animate__animated animate__bounceInRight" type="submit" name="btnsubmit">Save</button>
        </form>
      </div>
    </div>
  </center>
</body>

</html>
<?php

#if($_SERVER['REQUEST_METHOD'] == "POST"){
#  $ins = "update single_player set total = '$total' where id = '$id'";
#  $insq = mysqli_query($con,$ins);

#  header("Location: uindex.php");
#  die;
#}

?>