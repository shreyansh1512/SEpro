<?php

session_start();
require('../../authenticate/connect.php');

$username = $_SESSION['username'];

$curr = $_POST['curr'];
$newpass = $_POST['newpass'];


$hashcurpass=md5($curr);
$hashpass = md5($newpass);



$sql = "SELECT * FROM logindetails WHERE username ='$username'";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);

if($row['password']=== $hashcurpass){
  
  $sql1 = "UPDATE logindetails SET password='$hashpass' WHERE username = '$username'";  
  $result1 = $conn->query($sql1);
  echo "Password Updated";
}

else{
  echo "Incorrect Password";
}


?>
