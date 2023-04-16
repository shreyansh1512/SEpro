<?php

require('connect.php'); 
session_start();

    $usernow = $_POST['username'];
    $passnow = $_POST['password'];
    $hashpass = md5($passnow);
    $sql = "SELECT * FROM logindetails WHERE username = '$usernow' AND password = '$hashpass'";

    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result)===1){
	    $_SESSION['loggedIn'] = true;
        $_SESSION['displayname'] = $row['name'];
        $_SESSION['username'] = $row['username'];

        $role = $row['role'];
        
        if($role === 'student'){
            echo 'student';
            exit();
        }
        else{
            echo 'admin';
            exit();
        }
    }
	else{
        echo "Wrong Credentials.";
	}
?>

