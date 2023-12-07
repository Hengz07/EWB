<?php

  session_start();
  include '../private/connection.php';
  include 'function.php';

  $org_data = check_login($con);
  $id = $org_data['id'];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Profile</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../private/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
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
      <li><a href="fieldcord.php">Field</a></li>
      <li><a href="oindex.php">Home</a></li>
      <li><a class="active" href="profile.php">Update Profile</a></li>
      <li><a href="orlogout.php">Logout</a></li>
     </ul>
  </nav>

    <center>
    <div class="animate__animated animate__bounceIn form" style="box-shadow: 10px 10px rgba(0,0,0,0.3); margin-top:2em;">
      <div class="container">
        <form action="profile.php" method="post">
          <h2>Update Profile</h2>
          <br>
          <p style="text-align:left;">Account Created on: <?php echo $org_data['date']; ?></p>
          <br>
          <center>
          <div style="width: 100%; text-align: left;">
          </div>
          <br>
          <br>
            <div style="width: 100%; text-align: left;">
                <table style="width: 100%;">
                 <tr>
                    <td>Leader Name:</td>
                    <td><input style="text-align: left; padding: 5px; width: 100%;" type="text" name="lname" value="<?php echo $org_data['org_lead']; ?>"><br></td>
                  </tr>
                 <tr>
                    <td>Organization Name:</td>
                    <td><input style="text-align: left; padding: 5px; width: 100%;" type="text" name="uname" value="<?php echo $org_data['org_name']; ?>"><br></td>
                  </tr>
                  <tr>
                    <td>Email:</td>
                    <td><input style="text-align: left; padding: 5px; width: 100%;" type="email" name="email" value="<?php echo $org_data['org_email']; ?>"><br></td>
                  </tr>
                  <tr>
                    <td>Address:</td>
                    <td><input style="text-align: left; padding: 5px; width: 100%;" type="text" name="add" value="<?php echo $org_data['org_address']; ?>"></td>
                </tr>
                <tr>
                  <td>Phone Number:</td>
                  <td><input style="text-align: left; padding: 5px; width: 100%;" type="text" name="pnum" value="<?php echo $org_data['org_pnum']; ?>"><br></td>
                </tr>
                </table>
            </div>
          </center>
          <br><br>
          <style type="text/css">
            input[type="submit"]{
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

            input[type="submit"]:hover{
                background: black;
                border: 1px solid rgba(222, 224, 121);
                color: white;
            }
          </style>
          <button class="animate__animated animate__bounceInUp" style="box-shadow: 10px 10px rgba(0,0,0,0.3);" type="submit" onclick="return confirm('Confirm Update?');" ><b>Update</b></button>
        </form>
    </div>
  </div>
</center>
<?php
  if($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $uname = $_POST['uname'];
    $add = $_POST['add'];
    $pnum = $_POST['pnum'];
    $lname = $_POST['lname'];

    $select = "UPDATE org_req SET org_lead='$lname',org_name='$uname',org_email='$email',org_address='$add',org_pnum='$pnum' WHERE id = '$id'";
    $result = mysqli_query($con,$select);

    die;
  }
?>
</body>
</html>
