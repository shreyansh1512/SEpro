<?php

session_start();
require('../../authenticate/connect.php');

$username = $_SESSION['username'];
$name = $_POST['name'];
$pass = $_POST['pass'];
$hashpass = md5($pass);

$sql = "UPDATE logindetails SET password='$hashpass' WHERE username = '$username'";
$result = $conn->query($sql);

echo "Details updated.";

?>
