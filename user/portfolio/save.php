<?php

session_start();
require('../../authenticate/connect.php');


$username = $_SESSION['username'];
$about = $_POST['about'];
$tech = $_POST['tech'];
$Ntech = $_POST['Ntech'];
$prod = $_POST['prod'];
$prol = $_POST['prol'];


$sql = "SELECT * FROM about WHERE username = '$username'";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);

  if(mysqli_num_rows($result)===1){
     
  }
  else{
    $sql2 = "INSERT INTO about VALUES('$username','$about','$tech','$Ntech')";
    $result2 = $conn->query($sql2);
  }

$sql = "SELECT * FROM project WHERE username = '$username'";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);

  if(mysqli_num_rows($result)===1){
     
  }
  else{
    $sql2 = "INSERT INTO project VALUES('$username','$prod','$prol')";
    $result2 = $conn->query($sql2);
    echo "Portfolio created";
  }



?>
