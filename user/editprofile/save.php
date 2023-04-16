<?php

session_start();
require('../../authenticate/connect.php');

$username = $_SESSION['username'];
$name = $_POST['name'];
$pass = $_POST['pass'];
$curpass=$_POST['curpass'];
$hashcurpass=md5($curpass);
$hashpass = md5($pass);



$sql = "SELECT * FROM logindetails WHERE username ='$username'";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);

if($row['password']=== $hashcurpass){
  
  $sql1 = "UPDATE logindetails SET password='$hashpass' WHERE username = '$username'";  
  $result1 = $conn->query($sql1);
  
  $sql2 = "UPDATE logindetails SET name='$name' WHERE username = '$username'";
  $result2 = $conn->query($sql2);

  echo "Details updated.";
}

else{
  echo "Incorrect Password";
}


?>
