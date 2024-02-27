<?php
error_reporting(0);

session_start();
include('../private/connection.php');
include('function.php');

$user_data = check_login($con);
$id = $_SESSION['mar_id'];

$sql = "select * from marshal where mar_id = '$id'";
$query = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($query);
$game_id = $data['game_id'];

$gamequery = "select * from game where game_id='$game_id'";
$gameResult = mysqli_query($con, $gamequery);
$game = mysqli_fetch_assoc($gameResult);


//echo "<pre>";
//print_r($game);
//echo "<pre/>";
?>

<!DOCTYPE html>
<html>

<head>

  <script>
    function disableSubmit() {
      document.getElementById("submit").disabled = true;
    }

    function activateButton(element) {
      if (element.checked) {
        document.getElementById("submit").disabled = false;
      } else {
        document.getElementById("submit").disabled = true;
      }
    }
  </script>

  <title>Result</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../private/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body onload="disableSubmit()">

  <nav>
    <div class="logo">
      <h6>E-Woodball Marshal</h6>
    </div>
    <label for="click" class="menu-btn">
      <i class="fas fa-bars"></i>
    </label>
    <ul>
    </ul>
  </nav>

  <style>
    body {
      overflow-y: scroll;
      font-weight: bold;
    }

    .container table {
      border-collapse: collapse;
      border: 2px solid black;
    }

    .container th {
      background-color: lightgray;
    }

    #submit {
      margin-top: 5px;
      width: 20%;
    }

    #submit:hover {
      background-color: white;
      color: black;
    }
  </style>

  <center>
    <div class="form animate__animated animate__bounceIn" style="margin-top: 2em; width:70%; box-shadow: 10px 10px rgba(0,0,0,0.3);">
      <div class="container">
        <h2>Result <?php echo $game['game_name'] . "</h2><h2>" . date('d M Y', strtotime($game['game_date'])); ?> </h2>
        <br>
        <center>

          <?php
          $player = "select * from game_player where marshal='$id'";
          $pquery = mysqli_query($con, $player);

          while ($pdata = mysqli_fetch_array($pquery)) {
          ?>

            <table class="animate__animated animate__fadeInUp" border="1" style="border: solid black; width: 70%; text-align: center;">

              <tr>
                <th style="padding: 1em;" colspan="6"><?php echo $pdata['fullname']; ?></th>
              </tr>

              <tr>
                <td style="padding: 1em;"><b>Gate</b></td>
                <td style="padding: 1em;"><b>Par</b></td>
                <td style="padding: 1em;"><b>OB</b></td>
                <td style="padding: 1em;"><b>Point</b></td>
                <td style="padding: 1em;"><b>Status</b></td>
                <td style="padding: 1em;"><b>Action</b></td>
              </tr>

              <?php
              $scid = $pdata['id'];
              $score = "select * from game_score where play_id = '$scid' order by gate asc";
              $squery = mysqli_query($con, $score);
              $mark = 0;

              while ($sdata = mysqli_fetch_array($squery)) {
                extract($sdata);
              ?>
                <tr>
                  <td><?php echo $gate; ?></td>
                  <td><?php echo $par; ?></td>
                  <td><?php echo $ob; ?></td>
                  <td><?php echo $point; ?></td>
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
                  <td>
                    <center><a style="margin:5px;" href="scedit.php?gate=<?php echo $gate . "&id=" . $scid; ?>">Edit</a></center>
                  </td>
                </tr>
              <?php
                $mark = $mark + $point;
              }
              ?>
              <tr>
                <td style="padding: 1em; background-color:white;" colspan="5"><b>Total:</b></td>
                <td style="padding: 1em; background-color:white;"><?php echo $mark; ?></td>
              </tr>
            </table>
            <br>

          <?php
          }
          ?>
          <table class="animate__animated animate__fadeInUp" border="1" style="border: solid black; width: 30%; text-align: center;">
            <tr>
              <th style="padding: 1em;">Winner </th>
              <th style="padding: 1em;">Total Points </th>
            </tr>
            <?php
            $gplayer = "select p.*, s.play_id, sum(point) as pts from game_score as s join game_player as p on p.id = s.play_id and marshal = '" . $_SESSION['mar_id'] . "' group by id order by pts asc limit 1";
            $gpquery = mysqli_query($con, $gplayer);
            $player = mysqli_fetch_assoc($gpquery);
            ?>
            <tr>
              <td style="padding: 1em;"><?php echo $player['username']; ?></td>
              <td style="padding: 1em;"><?php echo $player['pts']; ?> </td>
            </tr>

          </table>
        </center>
        <br>

        <form action="marlogout.php">
          <center>
            <table class="animate__animated animate__fadeInUp" border="1" style="border: solid black; width: 30%; text-align: center;">
              <tr>
                <th colspan="2">Agreement</th>
              </tr>
              <style type="text/css">
                input[type="checkbox"] {
                  border: solid black;
                  display: inline-block;
                  width: 20px;
                  height: 20px;
                  margin: 5px;
                }
              </style>
              <tr>
                <td><input type="checkbox" name="terms" id="terms" onchange="activateButton(this)"></td>
                <td>Player Side</td>
              </tr>
            </table>
          </center>
          <br>
          <center><a class="animate__animated animate__bounceInUp" style="width:20%" href="marindex.php">Home</a></center>
          <input class="animate__animated animate__bounceInUp" type="submit" name="submit" id="submit">

        </form>
      </div>
    </div>
  </center>
</body>

</html>