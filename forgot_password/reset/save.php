<?php

session_start();
require('../../authenticate/connect.php');

$email = $_SESSION['email'];
$pass = $_GET['password'];
$hashpass = md5($pass);

$sql = "UPDATE logindetails SET password='$hashpass' WHERE email = '$email'";
$result = $conn->query($sql);

$sql2 = "DELETE FROM forgot WHERE email = '$email'";
$result2 = $conn->query($sql2);


session_unset();
session_destroy();

header("Location:../../index.html");

?>
