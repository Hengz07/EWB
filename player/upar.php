<?php

  session_start();
      include('../private/connection.php');
      include('function.php');

      $user_data = check_login($con);

    $querySingle_player = "select * from single_player where id=".$_GET['check']." limit 1";
    $resultSingle_player = mysqli_query($con, $querySingle_player);
    $Single_player = mysqli_fetch_assoc($resultSingle_player);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Setup Par</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../private/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<style>
  .form{
    box-shadow: 10px 10px rgba(0,0,0,0.3);
  }
  table,tr,td{
    padding: 5px;
  }
  #stgs{
    width: 100%;
  }
</style>
<body>

  <nav>
     <div class="logo">
      <h6>PSWoodball Player</h6>
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
  <h4 class="animate__animated animate__fadeInDown" style="background-color:white; text-align:center; width:auto; padding:5px;">Total Fairway: <?php echo $Single_player['fairway']; ?></h4>
  <form action="gate.php" method="post">
    <div class="form animate__animated animate__bounceIn">
      <div class="container">
          <h2>Setup Par</h2>
          <br>
          <div >
          <table >
          <tr>
          <td id="gates">Gate: </td>
         <!-- <td><input type="number" name="stgate"></td> -->
          <td>
      <select class="stg" id="stgs" name="stgate" required>
        <option value="">Select Gate</option>
        <?php for($i=1; $i<=$Single_player['fairway']; $i++ ){
          $query = "select * from single_score where player_id = ".$_GET['check']." and gate_number=$i limit 1";
          $result = mysqli_query($con, $query);
        ?>

        <option value="<?php echo $i ?>" <?php if($result &&  mysqli_num_rows($result)>0 ) { echo "disabled"; } ?>><?php echo $i ?></option>
        <?php } ?>
      </select>
      </td>
          </tr>
          <tr>
          <td>Par: </td>
          <td><input type="number" name="par" > <input type="hidden" name="singlePlayerId" value="<?php echo $Single_player['id']; ?>"></td>
          </tr>
          </table>
          </div>
          <br>
          <button class="animate__animated animate__bounceInLeft" onclick="history.back()">Back</button>
          <button class="animate__animated animate__bounceInRight" type="submit" name="submit">Next</button>
      </div>
    </div>
  </form>
</body>
</html>
