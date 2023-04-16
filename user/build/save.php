<?php

session_start();
require('../../authenticate/connect.php');


$username = $_SESSION['username'];
$about = $_POST['about'];

$tech1 = $_POST['tech1'];
$tech2 = $_POST['tech2'];
$tech3 = $_POST['tech3'];
$tech4 = $_POST['tech4'];
$tech5 = $_POST['tech5'];

$Ntech1 = $_POST['Ntech1'];
$Ntech2 = $_POST['Ntech2'];
$Ntech3 = $_POST['Ntech3'];
$Ntech4 = $_POST['Ntech4'];
$Ntech5 = $_POST['Ntech5'];

$pron1 = $_POST['pron1'];
$prod1 = $_POST['prod1'];
$prol1 = $_POST['prol1'];

$pron2 = $_POST['pron2'];
$prod2 = $_POST['prod2'];
$prol2 = $_POST['prol2'];



  $sql = "SELECT * FROM about WHERE username = '$username'";
  $result = $conn->query($sql);
  $row = mysqli_fetch_assoc($result);

  if(mysqli_num_rows($result)===1){
    $sql2 = "UPDATE about SET about = '$about' WHERE username = '$username'";
    $result2 = $conn->query($sql2);
  }
  else{
    $sql2 = "INSERT INTO about VALUES('$username','$about')";
    $result2 = $conn->query($sql2);
  }




  $sql = "SELECT * FROM technical WHERE username = '$username'";
  $result = $conn->query($sql);
  $row = mysqli_fetch_assoc($result);

  if(mysqli_num_rows($result)===0){

    $sql2 = "INSERT INTO technical VALUES('$username','tech1','$tech1')";
    $result2 = $conn->query($sql2);

    $sql2 = "INSERT INTO technical VALUES('$username','tech2','$tech2')";
    $result2 = $conn->query($sql2);

    $sql2 = "INSERT INTO technical VALUES('$username','tech3','$tech3')";
    $result2 = $conn->query($sql2);
    
    $sql2 = "INSERT INTO technical VALUES('$username','tech4','$tech4')";
    $result2 = $conn->query($sql2);
    
    $sql2 = "INSERT INTO technical VALUES('$username','tech5','$tech5')";
    $result2 = $conn->query($sql2);

  }
  else{
    $sql2 = "DELETE FROM technical WHERE username = '$username'";
    $result2 = $conn->query($sql2);
    
     $sql2 = "INSERT INTO technical VALUES('$username','tech1','$tech1')";
    $result2 = $conn->query($sql2);

    $sql2 = "INSERT INTO technical VALUES('$username','tech2','$tech2')";
    $result2 = $conn->query($sql2);

    $sql2 = "INSERT INTO technical VALUES('$username','tech3','$tech3')";
    $result2 = $conn->query($sql2);
    
    $sql2 = "INSERT INTO technical VALUES('$username','tech4','$tech4')";
    $result2 = $conn->query($sql2);
    
    $sql2 = "INSERT INTO technical VALUES('$username','tech5','$tech5')";
    $result2 = $conn->query($sql2);
  }




  $sql = "SELECT * FROM nonTechnical WHERE username = '$username'";
  $result = $conn->query($sql);
  $row = mysqli_fetch_assoc($result);

  if(mysqli_num_rows($result)===0){

    $sql2 = "INSERT INTO nonTechnical VALUES('$username','Ntech1','$Ntech1')";
    $result2 = $conn->query($sql2);

    $sql2 = "INSERT INTO nonTechnical VALUES('$username','Ntech2','$Ntech2')";
    $result2 = $conn->query($sql2);

    $sql2 = "INSERT INTO nonTechnical VALUES('$username','Ntech3','$Ntech3')";
    $result2 = $conn->query($sql2);
    
    $sql2 = "INSERT INTO nonTechnical VALUES('$username','Ntech4','$Ntech4')";
    $result2 = $conn->query($sql2);
    
    $sql2 = "INSERT INTO nonTechnical VALUES('$username','Ntech5','$Ntech5')";
    $result2 = $conn->query($sql2);

  }
  else{
    
    $sql2 = "DELETE FROM nonTechnical WHERE username = '$username'";
    $result2 = $conn->query($sql2);

    $sql2 = "INSERT INTO nonTechnical VALUES('$username','Ntech1','$Ntech1')";
    $result2 = $conn->query($sql2);

    $sql2 = "INSERT INTO nonTechnical VALUES('$username','Ntech2','$Ntech2')";
    $result2 = $conn->query($sql2);

    $sql2 = "INSERT INTO nonTechnical VALUES('$username','Ntech3','$Ntech3')";
    $result2 = $conn->query($sql2);
    
    $sql2 = "INSERT INTO nonTechnical VALUES('$username','Ntech4','$Ntech4')";
    $result2 = $conn->query($sql2);
    
    $sql2 = "INSERT INTO nonTechnical VALUES('$username','Ntech5','$Ntech5')";
    $result2 = $conn->query($sql2);
  }


  $sql = "SELECT * FROM project WHERE username = '$username'";
  $result = $conn->query($sql);

  if(mysqli_num_rows($result)===0){
    
    $sql2 = "INSERT INTO project VALUES('$username','1','$pron1','$prod1','$prol1')";
    $result2 = $conn->query($sql2);
    
    $sql2 = "INSERT INTO project VALUES('$username','2','$pron2','$prod2','$prol2')";
    $result2 = $conn->query($sql2);

    echo "Portfolio created!"; 
  
  }
  else{

    $sql2 = "DELETE FROM project WHERE username = '$username'";
    $result2 = $conn->query($sql2);

    $sql2 = "INSERT INTO project VALUES('$username','1','$pron1','$prod1','$prol1')";
    $result2 = $conn->query($sql2);
    
    $sql2 = "INSERT INTO project VALUES('$username','2','$pron2','$prod2','$prol2')";
    $result2 = $conn->query($sql2);
      
    echo "Portfolio Updated!";
  }



?>
