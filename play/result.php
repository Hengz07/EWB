<?php

    include('../private/connection.php');

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Result</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../private/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../player/player.css?v=<?php echo time();?>">
  </head>
  <style>

    .form{
      width: 50%;
    }

    @media screen and (max-width:424px) {
      .form{
        margin: 1em;
        padding: 15px;
        width: auto;
      }
      .container table,td,tr{
      border-collapse: collapse;
      padding: 1.5em;
      margin-inline: -1.5em;
      }
    }

    @media screen and (max-width:820px) {
      .form{
        margin: 1em;
        padding: 15px;
        width: auto;
      }
  
    }

    .container table,td,tr{
      border-collapse: collapse;
      padding: 1.5em;
      margin-inline: -1.5em;
    }

    .container tr:nth-child(even){
      background-color: #f2f2f2;
    }

    .container th{
      background-color: lightgray;
    }

    #back{
      border-radius: 10px;
      background-color: rgba(16, 15, 15, 0.7);
      color: white;
      border: 2px solid;
      padding:0.7em;
      width: 10em;
      margin-top: 5px;
      font-size:1em;
      text-align: center;
      text-decoration: none;
      display: inline-block;
    }

    #back:hover{
      color: white;
      background: black;
      border: 2px solid rgba(222, 224, 121);
    }

  </style>

  <body>

    <nav>
     <div class="logo">
      <h6>PSWoodball Quick Play</h6>
     </div>
     <input type="checkbox" id="click">
     <label for="click" class="menu-btn">
     <i class="fas fa-bars"></i>
     </label>
     <ul>
      <li><a href="../default.php">Home</a></li>
     </ul>
  </nav>

    <center>
    <div class="form">
      <div class="container">
        <form action="clear.php" method="post">
          <h2>Result</h2>
          <br>
          <center>
          <table border="1" style="border: solid black; width: 70%; text-align: center;">
            <tr>
              <th>No</th>
              <th>Gate</th>
              <th>Par</th>
              <th>OB</th>
              <th>Point</th>
            </tr>
            <?php

            $bil=1;
            $id = $_GET['check'];
            $sql = "select * from quickplay where qid='$id'";
            $result = mysqli_query($con,$sql);
            $total = 0;
            while ($data = mysqli_fetch_array($result))
            {
                extract($data);
                $total = $total + $point;


            ?>
            <tr>
            <td> <?php echo $bil++;?> </td>
            <td> <?php echo $gate;?> </td>
            <td> <?php echo $par;?> </td>
            <td> <?php echo $ob;?> </td>
            <td> <?php echo $point;?> </td>
            </tr>
            <?php
            }
            ?>


          </table>
          <br>
          <table border="1" style="border: solid black; width: 30%; text-align: center; background-color:#f2f2f2">
            <tr>
              <td>Total Points: </td>
              <td><?php echo $total;?><input type="hidden" name="ids" value="<?php echo $id;?>"></td>
            </tr>
          </table>
          </center>
          <a id="back" onclick="history.back()">Back</a>
          <button type="submit" name="btnsubmit">Exit</button>
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
