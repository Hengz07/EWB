<?php

  session_start();
    include('../private/connection.php');
    include('function.php');
    
    $user_data = check_login($con);

    $id = $_SESSION['id'];
    $date = date('Y-m-d');
    $f_id = $_GET['field'];

    $sql = "select * from field where fpar = '$f_id'";
    $query = mysqli_query($con,$sql);
    $data = mysqli_fetch_assoc($query);
    $fairway = $data['f_gate'];

    $ins = "insert into single_player (user_id,game_date,fairway) values ('$id','$date','$fairway')";
    $insertFairway = mysqli_query($con, $ins);

    $qid = "select * from single_player order by id DESC limit 1";
    $resid = mysqli_query($con, $qid);
    $play = mysqli_fetch_assoc($resid);
    $playid = $play['id'];

    header("Location: game.php?id=$playid&field=$f_id");

?>