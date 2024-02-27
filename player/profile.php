<?php

session_start();
include '../private/connection.php';
include 'function.php';

$user_data = check_login($con);
$id = $user_data['id'];
?>

<!DOCTYPE html>
<html>

<head>
  <title>Profile</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../private/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<style>
  body {
    overflow-x: auto;
  }

  input {
    width: auto;
    padding: 1em;
    border-radius: 10px;
  }

  .details tr,
  td {
    padding: 1em;
  }

  .details table {
    border-collapse: collapse;
  }

  @media screen and(max-width:1920px) {}

  @media screen and (max-width:424px) {
    .form {
      width: 100%;
      margin: auto;
    }

    .details table,
    td,
    tr {
      width: auto;
      border-collapse: collapse;
      padding: 1em;
    }

    .detail {
      width: auto;
    }

    input {
      width: auto;
      padding: 1em;
      border-radius: 10px;
    }
  }

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
      <li><a class="active" href="profile.php">Update Profile</a></li>
      <li><a href="ulogout.php">Logout</a></li>
    </ul>
  </nav>

  <center>
    <div class="container">
      <form action="profile.php" method="post">
        <h2>Update Profile</h2>
        <br>
        <p style="text-align:center;">Account Created on: <?php echo $user_data['date']; ?></p>
        <br>
        <center>
          <div class="details">
            <table>
              <tr>
                <td style="font-weight: bold;">Name:</td>
                <td><input type="text" name="fname" value="<?php echo $user_data['fullname']; ?>"></td>
              </tr>
              <tr>
                <td style="font-weight: bold;">Address:</td>
                <td><input type="text" name="add" value="<?php echo $user_data['address']; ?>"></td>
              </tr>
              <tr>
                <td style="font-weight: bold;">State:</td>
                <td><input type="text" name="state" value="<?php echo $user_data['state']; ?>"></td>
              </tr>
              <tr>
                <td style="font-weight: bold;">Email:</td>
                <td><input type="email" name="email" value="<?php echo $user_data['user_email']; ?>"></td>
              </tr>
              <tr>
                <td style="font-weight: bold;">Phone Number:</td>
                <td><input type="text" name="pnum" value="<?php echo $user_data['pnum']; ?>"></td>
              </tr>
              <tr>
                <td style="font-weight: bold;">Status:</td>
                <td><input type="text" name="status" value="<?php echo $user_data['status']; ?>"></td>
              </tr>
              <tr>
                <td style="font-weight: bold;">Age:</td>
                <td><input type="text" name="age" value="<?php echo $user_data['age']; ?>"></td>
              </tr>
              <tr>
                <td style="font-weight: bold;">Postal Code:</td>
                <td><input type="text" name="postal" value="<?php echo $user_data['postalcode']; ?>"></td>
              </tr>
              <tr>
                <td style="font-weight: bold;">Username:</td>
                <td><input type="text" name="uname" value="<?php echo $user_data['user_name']; ?>"></td>
              </tr>
              <tr>
                <td style="font-weight: bold;">Birth Date:</td>
                <td><input type="date" name="birth" value="<?php echo $user_data['birth']; ?>"></td>
              </tr>
              <tr>
                <td style="font-weight: bold;">Gender:</td>
                <td><input type="text" name="gender" value="<?php echo $user_data['gender']; ?>"></td>
              </tr>
              <tr>
                <td style="font-weight: bold;">Race:</td>
                <td><input type="text" name="race" value="<?php echo $user_data['race']; ?>"></td>
              </tr>
            </table>
          </div>
        </center>
        <button type="submit" onclick="return confirm('Confirm Update?')"><b>Update</b></button>
      </form>
    </div>
  </center>
  <?php
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fname =  $_POST['fname'];
    $address = $_POST['add'];
    $state = $_POST['state'];
    $email = $_POST['email'];
    $pnum = $_POST['pnum'];
    $status = $_POST['status'];
    $age = $_POST['age'];
    $postal = $_POST['postal'];
    $uname = $_POST['uname'];
    $birth = $_POST['birth'];
    $gender = $_POST['gender'];
    $race = $_POST['race'];

    $select = "UPDATE users SET user_name='$uname',user_email='$email',fullname='$fname',pnum='$pnum',address='$address',postalcode='$postal',state='$state',birth='$birth',gender='$gender',age='$age',status='$status',race='$race' WHERE id = '$id'";
    $result = mysqli_query($con, $select);

    die;
  }
  ?>
</body>

</html>