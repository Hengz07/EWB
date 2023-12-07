<?php
    include("../private/connection.php");
    
    if(isset($_POST['submit']))
    {
      $fairway=$_POST['numfair'];
      
      $query = "insert into quick (fairway) values ('$fairway')";
      $insertFairway = mysqli_query($con, $query);
      
      if ($insertFairway === TRUE) {
        
        $queryid = "select * from quick order by id DESC limit 1";
        $resultId = mysqli_query($con, $queryid);
        $playerSingleGameId = mysqli_fetch_assoc($resultId);
        
        header("Location: par.php?check=".$playerSingleGameId['id']);
        
        echo "<pre>";
        print_r($playerSingleGameId);
        echo "</pre>"; 
        
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      
      
      
    }
?>