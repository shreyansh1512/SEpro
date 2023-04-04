<?php
session_start();
require('../../authenticate/connect.php');

$fname = $_POST['name'];
$pass = $_POST['password'];
$email = $_SESSION['email'];
$dept = $_SESSION['dept'];
$username = $_SESSION['username'];
$hashpass = md5($pass);

$sql = "INSERT INTO logindetails VALUES('$username','$hashpass','$email','$fname','$dept','student')";
$result = $conn->query($sql);

$sql2 = "DELETE FROM registration WHERE email = '$email'";
$result2 = $conn->query($sql2);


session_unset();
session_destroy();

header("Location:../../index.html");

?>
