<?php

  session_start();
  include '../private/connection.php';
  include 'function.php';

  $admin_data = check_login($con);

  $id = $_GET['id'];
  $query = "select * from org_req where id='$id'";
  $result = mysqli_query($con,$query);
  $org_data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Update</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../private/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body style="background-color: rgba(38, 194, 129,1);">

    <nav>
  		 <div class="logo">
  			<h6>PSWoodball Admin</h6>
  		 </div>
  		 <input type="checkbox" id="click">
  		 <label for="click" class="menu-btn">
  		 <i class="fas fa-bars"></i>
  		 </label>
  		 <ul>
  			      <li><a class="active" href="org.php">Organization</a></li>
              <li><a href="marsh.php">Marshal</a></li>
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
        <form method="post" onsubmit="return confirm('Are you sure you wish to update?');">
          <h2>Update Organization</h2>
          <br>
          <p style="text-align:center;">Account Created on: <?php echo $org_data['date']; ?></p>
          <br>
          <center>
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
                <tr>
                  <td>Password</td>
                  <td><input style="text-align: left; padding: 5px; width: 100%;" type="password" name="pass" value="<?php echo $org_data['org_pass']; ?>"><br></td>
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
          <button type="submit"><b>Update</b></button>
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
    $pass = $_POST['pass'];

    if(!empty($pass)){
    $select = "UPDATE org_req SET org_lead='$lname',org_name='$uname',org_email='$email',org_address='$add',org_pnum='$pnum',org_pass='$pass' WHERE id = '$id'";
    $result = mysqli_query($con,$select);

    header("Location: orgdata.php?msg=Record Updated Successfully!");
    die;
	}
  }
?>
</body>
</html>
