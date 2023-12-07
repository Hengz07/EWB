<?php

    session_start();
        include('../private/connection.php');
        include('function.php');
        $marid = $_SESSION['mar_id'];

        $mar_data = check_login($con);

        $gameid = $_GET['game'];
        $gate = $_GET['gate'];

        $game = "select * from game where game_id = '$gameid'";
        $gquery = mysqli_query($con,$game);
        $gdata = mysqli_fetch_assoc($gquery);
        $fname = $gdata['fieldName'];

        $field = "select * from field where f_name = '$fname'";
        $fquery = mysqli_query($con,$field);
        $fdata = mysqli_fetch_assoc($fquery);
        $fgate = $fdata['f_gate'];
        $fpar = $fdata['fpar'];

        $par = "select * from field_par where fpar = '$fpar'";
        $pquery = mysqli_query($con,$par);
        $pdata = mysqli_fetch_assoc($pquery);
        $thispar = $pdata['gate'.$gate];

      if($_SERVER['REQUEST_METHOD'] == "POST"){

        $sql = "select * from game_player where game_code = '$gameid' and marshal = '$marid'";
        $query = mysqli_query($con, $sql);

        while ($data = mysqli_fetch_array($query)){
            $player = $data['id'];

            $ob = $_POST['obsave'.$player];
            $point = $_POST['pointsave'.$player];

            $up = "update game_score set point = '$point', ob = '$ob' where play_id = '$player' and game_id = '$gameid' and gate = '$gate'";
            mysqli_query($con, $up);
        }
        header("Location: marindex.php");
      }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../private/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
    .detail,table{
        border-collapse: collapse;
    }
    .position input[type=text]{
        width: 100%;
        padding-left: 3em;
        padding-right: 3em;
        margin:5px;
    }
    .form{
        box-shadow: 10px 10px rgba(0,0,0,0.3); margin-top:1em; width:50%;
    }

    @media screen and (max-width:1200px) {
        .form{
            width: 70%;
        }
        .position table{
            margin-left: 1em;
        }
    }
    </style>
    <title>Marshal</title>
</head>

<body>
<nav>
    <div class="logo">
        <h6>PSWoodball Marshal</h6>
    </div>

    <input type="checkbox" id="click">

    <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
    </label>

    <ul>
    </ul>
</nav>

<form method="POST">
<div class="form animate__animated animate__bounceIn">
<h1>Woodball Scoreboard</h1>

<div class="position">
<table class="animate__animated animate__fadeInLeft">
<br>
    <tr>
        <td><b><p style="float: left; padding-left: 20px; text-align:center;">Marshal Name:</p></b></td>
	    <td><b><p style="float: left; padding-left: 20px; text-align:center;"><?php echo $mar_data['marname']; ?></p></b></td>
    </tr>
    <tr>
        <td><b><p style="float: left; padding-left: 20px; text-align:center;">Par:</p></b></td>
	    <td><b><p style="float: left; padding-left: 20px; text-align:center;"><?php echo $thispar; ?></p></b></td>
    </tr>
    <tr>
        <td><b><p style="float: left; padding-left: 20px; text-align:center;">Max:</p></b></td>
        <td><b><p style="float: left; padding-left: 20px; text-align:center; " id="maxp"><?php $max=$thispar * 3; echo $max;?></p></b></td>
    </tr>
</table>
</div>
<br>

<style>
    .okas table{
        border-collapse: collapse;
    }
    .okas th{
        background-color: lightgray;
    }
</style>

<center>
<div class="okas">
    <table class="animate__animated animate__fadeInUp" style="border-collapse: collapse;" border="2">
        <thead>
            <tr>
                <th style="padding: 1em;">PLAYER NAME</th>
                <th style="display:none">Overview</th>
                <th style="padding: 1em;">POINT</th>
                <th style="padding: 1em;">OB</th>
                <th style="padding: 1em;">MARK</th>
                <th style="padding: 1em;">CORECTION</th>
                <th style="padding: 1em;">STATUS</th>
            </tr>
        </thead>

    <style type="text/css">
        .aa{
            display: inline-block;
            border-radius: 10px;
            background: yellow;
            border: 2px solid;
            color: black;
            padding: 5px;
            width: 50%;
            margin: 5px;
            font-size:1em;
            text-align: center;
            text-decoration: none;
        }

        .aa:hover{
            background: black;
            border: 2px solid rgba(222, 224, 121);
            color: white;
        }

        .disabled-link {
        pointer-events: none;
        border-radius: 10px;
        background: black;
        border: 2px solid;
        color: yellow;
        padding: 5px;
        width: 50%;
        margin: 5px;
        font-size:1em;
        text-align: center;
        text-decoration: none;
        }
        #ok{
            width:90%; background-color: white;
        }
        #ok:hover{
            color: black;
        }
        #habis{
            width:90%; padding-top:2em; padding-bottom:2em; margin:2px; background-color: #fff200;
            font-weight: bold;
        }
    </style>

<tbody>

    <?php

    $sql = "select * from game_player where game_code = '$gameid' and marshal = '$marid'";
    $query = mysqli_query($con, $sql);

    while ($data = mysqli_fetch_array($query)) {
        extract($data);
        $gscore = "select * from game_score where play_id = '$id' and gate = '$gate'";
        $gsquery = mysqli_query($con,$gscore);
        $gsdata = mysqli_fetch_assoc($gsquery);

    ?>
    <tr>
        <td style="text-align: center; font-weight:bold;"><?php echo $username; ?></td>
        <td style="text-align: center; font-weight:bold;"><h2 id="point<?php echo $id; ?>"></h2><input type="hidden" name="pointsave<?php echo $id; ?>" id="savepoint<?php echo $id; ?>"></td>
        <td style="text-align: center; font-weight:bold;"><h2 id="ob<?php echo $id; ?>"></h2><input type="hidden" name="obsave<?php echo $id; ?>" id="saveob<?php echo $id; ?>"></td>
        <td>
            <input type="hidden" name="ScoreId" value="<?php echo $username; ?>">
            <input type="hidden" name="PlayerId" value="<?php echo $id; ?>">
            <input type="hidden" name="game" value="<?php echo $gameid; ?>">
			<span id="add<?php echo $id?>">
            <a href="#" id="ok" class="aa" onclick="tick<?php echo $id; ?>()" id="p<?php echo $id; ?>"><b>Tick</b></a>
            <a href="#" id="ok" class="aa" onclick="ob<?php echo $id; ?>()" id="o<?php echo $id; ?>"><b>OB</b></a>
			</span>

        </td>
        <td>
		<span id="edit<?php echo $id?>">
          <a style="width:90%; background-color: rgba(16, 15, 15, 0.7); color:white;" class="aa" href="#" onclick="untick<?php echo $id; ?>()" id="up<?php echo $id?>" ><b>Undo Tick</b></a>
          <a style="width:90%; background-color: rgba(16, 15, 15, 0.7); color:white;" class="aa" href="#" onclick="unob<?php echo $id; ?>()" id="uo<?php echo $id?>" ><b>Undo OB</b></a>
		 </span>
        </td>
        <td>
          <input id="habis" class="aa" type="button" onclick="siap<?php echo $id; ?>()" value="Finish"/>
        </td>

    </tr>
    <?php } ?>
</tbody>

</table>
</div></center>
<br>
<!--button ni klau dh siap database kita setup balik-->
<!-- <center><a class="aa" onclick="return confirm('Confirm Reset Gate Point?');" href="undo.php?gate=<?php //echo $gate."&game=".$gameid;?>"><b>Reset</b></a></center> -->
<button class="animate__animated animate__bounceInUp" style="box-shadow: 10px 10px rgba(0,0,0,0.3);" type="submit" name="go"><b>SUBMIT</b></button>

</div>
</form>

</body>

  <script type="text/javascript">

    <?php

    $sql2 = "select * from game_player where game_code = '$gameid' and marshal = '$marid'";
    $query2 = mysqli_query($con,$sql2);

    while($calc = mysqli_fetch_array($query2)){
        $pid = $calc['id'];

    ?>

    var pts<?php echo $pid; ?> = 0;
    var obs<?php echo $pid; ?> = 0;
    var max = document.getElementById("maxp").innerText;

    document.getElementById("point<?php echo $pid; ?>").innerText = pts<?php echo $pid; ?>;
    document.getElementById("ob<?php echo $pid; ?>").innerText = obs<?php echo $pid; ?>;

    function tick<?php echo $pid; ?>() {
        var btntick = document.getElementById("p<?php echo $pid; ?>");

        if (pts<?php echo $pid; ?> < max) {
          pts<?php echo $pid; ?> = pts<?php echo $pid; ?> + 1;
          document.getElementById("point<?php echo $pid; ?>").innerText = pts<?php echo $pid; ?>;
          document.getElementById("savepoint<?php echo $pid; ?>").value = pts<?php echo $pid; ?>;
        }

        if (pts<?php echo $pid; ?> == max) {
          btntick.disabled = true;
        }
    }

    function ob<?php echo $pid; ?>() {
        var btnob = document.getElementById("o<?php echo $pid; ?>");

        if (pts<?php echo $pid; ?> < max) {
          pts<?php echo $pid; ?> = pts<?php echo $pid; ?> + 1;
          obs<?php echo $pid; ?> = obs<?php echo $pid; ?> + 1;
          document.getElementById("point<?php echo $pid; ?>").innerText = pts<?php echo $pid; ?>;
          document.getElementById("savepoint<?php echo $pid; ?>").value = pts<?php echo $pid; ?>;
          document.getElementById("ob<?php echo $pid; ?>").innerText = obs<?php echo $pid; ?>;
          document.getElementById("saveob<?php echo $pid; ?>").value = obs<?php echo $pid; ?>;
        }

        if (pts<?php echo $pid; ?> == max) {
          btnob.disabled = true;
        }
    }

    function untick<?php echo $pid; ?>() {
        var btnuntick = document.getElementById("up<?php echo $pid; ?>");

        if (pts<?php echo $pid; ?> > obs<?php echo $pid; ?>) {
          pts<?php echo $pid; ?> = pts<?php echo $pid; ?> - 1;
          document.getElementById("point<?php echo $pid; ?>").innerText = pts<?php echo $pid; ?>;
          document.getElementById("savepoint<?php echo $pid; ?>").value = pts<?php echo $pid; ?>;
        }

        if (pts<?php echo $pid; ?> == obs<?php echo $pid; ?>) {
          btnuntick.disabled = true;
        }
    }

    function unob<?php echo $pid; ?>() {
        var btnunob = document.getElementById("uo<?php echo $pid; ?>");

        if (pts<?php echo $pid; ?> > 0 && obs<?php echo $pid; ?> > 0) {
          pts<?php echo $pid; ?> = pts<?php echo $pid; ?> - 1;
          obs<?php echo $pid; ?> = obs<?php echo $pid; ?> - 1 ;
          document.getElementById("point<?php echo $pid; ?>").innerText = pts<?php echo $pid; ?>;
          document.getElementById("savepoint<?php echo $pid; ?>").value = pts<?php echo $pid; ?>;
          document.getElementById("ob<?php echo $pid; ?>").innerText = obs<?php echo $pid; ?>;
          document.getElementById("saveob<?php echo $pid; ?>").value = obs<?php echo $pid; ?>;
        }

        if (obs<?php echo $pid; ?> == 0) {
          btnunob.disabled = true;
        }
    }

    function siap<?php echo $pid; ?>() {
        document.getElementById("add<?php echo $pid; ?>").innerHTML = "<button id='ok' class='aa' onclick='tick<?php echo $pid; ?>()' id='p<?php echo $pid; ?>' disabled><b>Tick</b></button><button id='ok' class='aa' onclick='ob<?php echo $pid; ?>()' id='o<?php echo $pid; ?>' disabled><b>OB</b></button>";
        
        document.getElementById("edit<?php echo $pid; ?>").innerHTML = "<button style='width:90%; background-color: rgba(16, 15, 15, 0.7); color:white;' class='aa' onclick='untick<?php echo $pid; ?>()' id='up<?php echo $pid?>' disabled><b>Undo Tick</b></button><button style='width:90%; background-color: rgba(16, 15, 15, 0.7); color:white;' class='aa' onclick='unob<?php echo $pid; ?>()' id='uo<?php echo $pid?>' disabled><b>Undo OB</b></button>";
    }

    <?php } ?>
  </script>

</html>
