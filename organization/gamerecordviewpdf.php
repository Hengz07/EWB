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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <style type="text/css">
        .bb{
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

        .bb:hover{
            background: black;
            border: 1px solid rgba(222, 224, 121);
            color: white;
        }

        input{
            border-radius: 10px;
            width: 80%;
            text-align: center;
            border: 2px solid rgba(224, 211, 121);
            padding: 5px;
            font-size: 1em;
        }

        .aa{
            display: inline-block;
            border-radius: 10px;
            background: blue;
            border: 1px solid;
            color: white;
            padding: 5px;
            width: 5%;
            margin-top: 5px;
            margin-right: 15%;
            font-size:1em;
            text-align: center;
            text-decoration: none;
            float: right;
        }

        .aa:hover{
            background: black;
            border: 1px solid rgba(222, 224, 121);
            color: white;
        }
    </style>

    <nav>
     <div class="logo">
      <h6>PSWoodball Player</h6>
  </nav>

    <center>
        <form action="record.php" method="post">
          <h2 style="margin:3%">Full Result Player</h2>
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
            $id = $_GET['viewrecord'];
            $sql = "select * from game_score where play_id='$id'";
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
          <table border="1" style="border: solid black; width: 30%; text-align: center;">
            <tr>
              <td>Total Points: </td>
              <td><?php echo $total;?></td>
            </tr>
          </table>
          </center>
          <br><br>
        </form>
</center>
  </body>
</html>
