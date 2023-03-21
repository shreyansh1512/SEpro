<?php

require('connect.php'); 
session_start();
$error = "";

    $usernow = $_POST['username'];
    $emailnow = $_POST['email'];
    $FNnow = $_POST['firstName'];
    $LNnow = $_POST['lastName'];
    $passnow = $_POST['password'];
    $PCnow = $_POST['ConfirmPassword'];
    
    if (!$FNnow) {
      $error .= "First Name is required <br>";
    }

    if (!$LNnow){
      $error .= "Last Name is required <br>";
    }
    
    if (!$emailnow) {
      $error .= "Email is required <br>";
    }
    else{
        $sql = "SELECT * FROM logindetails WHERE email = '$emailnow'"; 
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
	    if(mysqli_num_rows($result)===1){
            $error .= "Email already taken <br>";
        }
    } 
    
    if (!$usernow) {
      $error .= "Username is required <br>";
    }
    else{
        $sql = "SELECT * FROM logindetails WHERE username = '$usernow'"; 
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
	    if(mysqli_num_rows($result)===1){
            $error .= "Username already taken <br>";
        }
    } 

    if (!$passnow) {
      $error .= "Password is required <br>";
    }
    else{
        if(!$PCnow){
            $error .= "Please confirm password";
        }
        else{
            if($passnow != $PCnow){
                $error .= "Passwords do not match";
            }
        }
    }


    if ($error) {
        echo $error;
        echo "<br> Please go back";
     } 
    else{
        //$hash = password_hash($passnow, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `logindetails`  VALUES ('$usernow', '$passnow', '$emailnow', '$FNnow', '$LNnow')";
        $result = mysqli_query($conn,$sql);
        header("Location:../index.html");
        exit();
    }
?>
