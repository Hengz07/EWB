<?php

session_start();
include '../private/connection.php';
include 'function.php';

$admin_data = check_login($con);

$id = $_GET['mar_id'];
$query = "select * from marshal where mar_id='$id'";
$result = mysqli_query($con, $query);
$mar_data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Update</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../private/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="background-color: rgba(38, 194, 129,1);">

  <nav>
    <div class="logo">
      <h6>E-Woodball Admin</h6>
    </div>
    <input type="checkbox" id="click">
    <label for="click" class="menu-btn">
      <i class="fas fa-bars"></i>
    </label>
    <ul>
      <li><a href="org.php">Organization</a></li>
      <li><a class="active" href="marsh.php">Marshal</a></li>
      <li><a href="usr.php">User</a></li>
      <li><a href="field.php">Field</a></li>
      <li><a href="admin.php">Home</a></li>
      <li><a href="profile.php">Update Profile</a></li>
      <li><a href="alogout.php">Logout</a></li>
    </ul>
  </nav>

  <center>
    <div class="form" style="border:2px solid black; box-shadow: 10px 10px rgba(0,0,0,0.3);">
      <div class="container">
        <form method="post" onsubmit="return confirm('Are you sure you wish to Update?');">
          <h2>Update Marshal</h2>
          <br>
          <center>
            <div style="width: 100%; text-align: left; margin:5px;">
              <table style="width: 100%;">
                <tr>
                  <td>Marshal Name:</td>
                  <td><input style="text-align: left; padding: 5px; width: 100%;" type="text" name="uname" value="<?php echo $mar_data['marname']; ?>"><br></td>
                </tr>
                <tr>
                  <td>Phone Number:</td>
                  <td><input style="text-align: left; padding: 5px; width: 100%;" type="text" name="pnum" value="<?php echo $mar_data['marpnum']; ?>"><br></td>
                </tr>
                <tr>
                  <td>Game ID:</td>
                  <td><input style="text-align: left; padding: 5px; width: 100%;" type="number" name="gameid" value="<?php echo $mar_data['game_id']; ?>"><br></td>
                </tr>
              </table>
            </div>
          </center>
          <br><br>
          <style type="text/css">
            input[type="submit"] {
              display: inline-block;
              border-radius: 10px;
              background: yellow;
              border: 1px solid;
              color: black;
              padding: 5px;
              width: 90%;
              margin-top: 5px;
              font-size: 1em;
              text-align: center;
              text-decoration: none;
            }

            input[type="submit"]:hover {
              background: black;
              border: 1px solid rgba(222, 224, 121);
              color: white;
            }
          </style>
          <button type="submit"><b>Update</b></button>
        </form>
      </div>
    </div>
  </center>
  <?php
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $uname = $_POST['uname'];
    $pnum = $_POST['pnum'];
    $gameid = $_POST['gameid'];

    if (!empty($uname)) {
      $select = "UPDATE marshal SET marname='$uname',marpnum='$pnum',game_id='$gameid' WHERE mar_id = '$id'";
      $result = mysqli_query($con, $select);

      header("Location: marsh.php?msg=Record Updated Successfully!");
      die;
    }
  }
  ?>
</body>

</html>