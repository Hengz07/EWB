<?php

session_start();
include('../private/connection.php');
include('function.php');

$user_data = check_login($con);

$query = "select * from single_score where single_id=" . $_GET['check'] . " and gate_number = " . $_GET['g'] . " limit 1";
$resultSingleScore = mysqli_query($con, $query);
$singleScore = mysqli_fetch_assoc($resultSingleScore);

$stgate = $singleScore['gate_number'];
$par = $singleScore['par'];

?>

<!DOCTYPE html>
<html>

<head>
  <title>Scoreboard</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../private/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<style>
  .form {
    width: 30%;
    box-shadow: 10px 10px rgba(0, 0, 0, 0.3);
    margin-top: 1em;
  }

  @media screen and (max-width:424px) {
    .form {
      width: 80%;
    }

    .container {
      margin: -1em;
      width: auto;
    }
  }

  .position table,
  tr {
    margin: 1em;
  }

  .position a {
    width: 100%;
  }

  #aa {
    padding: 1em;
    background-color: white;
    color: black;
    margin-right: 1em;
  }

  #bb {
    margin-left: 1em;
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
        <center>
          <form action="score.php" method="post">
            <h2>Scoreboard</h2>
            <br>
            <table>
              <tr>
                <td>Gate</td>
                <td><input type="text" name="gate" value="<?php echo $stgate; ?>" disabled></td>
              </tr>
              <tr>
                <td>Par</td>
                <td><input type="text" name="par1" value="<?php echo $par; ?>" disabled></td>
              </tr>
              <tr>
                <td>Point</td>
                <td>
                  <h2 style="text-align:center;" id="point"></h2><input type="hidden" name="point" id="pointSave" value="">
                </td>
              </tr>
              <tr>
                <td>OB</td>
                <td>
                  <h2 style="text-align:center;" id="obp"></h2><input type="hidden" name="ob" id="obSave" value="">
                </td>
              </tr>
              <tr>
                <td>Max</td>
                <td>
                  <h2 style="text-align:center;" id="max"></h2>
                </td>
              </tr>
            </table>
        </center>
        <input type="hidden" name="singleScoreId" value="<?php echo $_GET['check'] ?>">
        <input type="hidden" name="singlePlayerId" value="<?php echo $singleScore['player_id'] ?>">

        <div class="position">
          <center>
            <table>
              <tr>
                <td><a class="animate__animated animate__bounceInLeft" id="aa" href="#" onclick="tick()" id="a"><b>Tick</b></a></td>
                <td><a class="animate__animated animate__bounceInRight" id="bb" href="#" onclick="undot()" id="d"><b>Undo<br>Tick</b></a></td>
              </tr>
              <tr>
                <td><a class="animate__animated animate__bounceInLeft" id="aa" href="#" onclick="ob()" id="b"><b>OB</b></a></td>
                <td><a class="animate__animated animate__bounceInRight" id="bb" href="#" onclick="undoo()" id="c"><b>Undo<br>OB</b></a></td>
              </tr>
            </table>
            <br>
            <button class="animate__animated animate__bounceInUp" type="submit" name="submit"><b>Submit</b></button>
        </div>
  </center>
  </div>
  </div>
  </center>
  <script type="text/javascript">
    //initialising a variable name data
    var data1 = 0;
    var data2 = 0;
    var max = <?php echo $par; ?> * 3;

    //printing default value of data that is 0 in h2 tag
    document.getElementById("point").innerText = data1;
    document.getElementById("obp").innerText = data2;
    document.getElementById("max").innerText = max;



    //creation of tick function
    function tick() {
      var button1 = document.getElementById("a");

      if (data1 < max) {
        data1 = data1 + 1;
        document.getElementById("point").innerText = data1;
        document.getElementById("pointSave").value = data1;
      }

      if (data1 == max) {
        button1.disabled = true;
      }
    }

    function undot() {
      var button3 = document.getElementById("d");

      if (data1 > 0) {
        data1 = data1 - 1;
        document.getElementById("point").innerText = data1;
        document.getElementById("pointSave").value = data1;
      }

      if (data2 == 0) {
        button3.disabled = true;
      }
    }

    //creation of ob function
    function ob() {
      var button2 = document.getElementById("b");

      if (data1 < max) {
        data1 = data1 + 1;
        data2 = data2 + 1;
        document.getElementById("point").innerText = data1;
        document.getElementById("pointSave").value = data1;
        document.getElementById("obp").innerText = data2;
        document.getElementById("obSave").value = data2;
      }

      if (data1 == max) {
        button2.disabled = true;
      }
    }

    function undoo() {
      var button4 = document.getElementById("c");

      if (data2 > 0 && data1 > 0) {
        data1 = data1 - 1;
        data2 = data2 - 1;
        document.getElementById("point").innerText = data1;
        document.getElementById("pointSave").value = data1;
        document.getElementById("obp").innerText = data2;
        document.getElementById("obSave").value = data2;
      }

      if (data2 == 0) {
        button4.disabled = true;
      }
    }
  </script>
</body>

</html>