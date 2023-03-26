<?php

require('connect.php'); 
session_start();

    $usernow = $_POST['username'];
    $passnow = $_POST['password'];

    $sql = "SELECT * FROM logindetails WHERE username = '$usernow' AND password = '$passnow'";

    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result)===1){
	    $_SESSION['loggedIn'] = true;
		$_SESSION['displayname'] = $row['username'];
        header("Location:../userProfile");
        exit();
    }
	else{
       	
	}
?>
