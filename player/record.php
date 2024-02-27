<?php

session_start();
include('../private/connection.php');
include('function.php');

$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>

<head>
  <title>Player Record</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../private/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<style>
  @media screen and (max-width:1920px) {
    .form {
      width: 80%;
    }

    table,
    tr,
    td {
      width: 60%;
    }
  }

  @media screen and (max-width:424px) {
    .form {
      width: 90%;
    }

    table,
    tr,
    td {
      width: auto;
    }

    .prepare table,
    tr,
    td {
      margin-left: -2.5em;
      padding-inline: 0.5em;
    }
  }

  .prepare table,
  tr,
  td {
    border-collapse: collapse;
  }

  .prepare th {
    background-color: lightgray;
    padding-left: 3px;
    padding-right: 3px;
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
        <form action="uindex.php" method="post">
          <h2>Record</h2>
          <br>

          <center>
            <div class="prepare">
              <table class="animate__animated animate__fadeInUp" border="1" style="border: solid black;  text-align: center; ">
                <tr>
                  <th>No</th>
                  <th>Fairway</th>
                  <th>Game Date</th>
                  <th>Points</th>
                  <th>action</th>
                </tr>
            </div>
            <?php

            $bil = 1;
            $uid = $_SESSION['id'];
            $sql = "select * from single_player where user_id='$uid' order by id DESC";
            $result = mysqli_query($con, $sql);
            while ($data = mysqli_fetch_array($result)) {
              extract($data);


            ?>
              <tr>
                <td> <?php echo $bil++; ?> </td>
                <td> <?php echo $fairway; ?> </td>
                <td> <?php echo $game_date; ?> </td>
                <td> <?php echo $total; ?> </td>
                <td>
                  <center>
                    <?php if (mysqli_num_rows($result) > 0) { ?>
                      <a style="width: 100%; padding: 10px; margin: 2px;" class="bb" id="print-btn" href="urecordview.php?viewrecord=<?php echo $id; ?>">View</a> <?php } ?>
                  </center>
                </td>
              </tr>
            <?php
            }
            ?>

            </table>
          </center>

          <br><br>
          <button class="animate__animated animate__bounceInUp" type="submit">Exit</button>

        </form>
      </div>
    </div>
  </center>
</body>

</html>