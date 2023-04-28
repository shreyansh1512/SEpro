<?php

session_start();
require('../../authenticate/connect.php');

$username = $_SESSION['username'];

$name = $_POST['name'];
$git = $_POST['git'];
$insta = $_POST['insta'];
$twit = $_POST['twit'];
$face = $_POST['face'];
$Hskill = $_POST['Hskill'];
$Hhandle = $_POST['Hhandle'];


$sql = "UPDATE logindetails SET name = '$name' WHERE username = '$username'"; 
$result = $conn->query($sql);

$sql = "SELECT * FROM handles WHERE username = '$username'"; 
$result = $conn->query($sql);
if(mysqli_num_rows($result)===0){
  $sql = "INSERT INTO handles VALUES('$username','$git','$insta','$twit','$face')"; 
  $result = $conn->query($sql);
}
else{
  $sql = "UPDATE handles SET git = '$git' , insta = '$insta', twit= '$twit', face = '$face' WHERE username = '$username'"; 
  $result = $conn->query($sql);
}

$sql = "SELECT * FROM flags WHERE username = '$username'"; 
$result = $conn->query($sql);
if(mysqli_num_rows($result)===0){
  $sql = "INSERT INTO flags VALUES('$username','$Hskill','$Hhandle')"; 
  $result = $conn->query($sql);
}
else{
  $sql = "UPDATE flags SET Ntech = '$Hskill' , social = '$Hhandle' WHERE username = '$username'"; 
  $result = $conn->query($sql);
}


echo "Details Updated";

?>
