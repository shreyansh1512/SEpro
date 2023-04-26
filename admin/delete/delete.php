<?php

require ('../../authenticate/connect.php');

$username = $_POST['username'];

    $sql = "DELETE FROM about WHERE username = '$username'";   
    $result = $conn->query($sql);

    $sql = "DELETE FROM technical WHERE username = '$username'";   
    $result = $conn->query($sql);
    
    $sql = "DELETE FROM nonTechnical WHERE username = '$username'";   
    $result = $conn->query($sql);

    $sql = "DELETE FROM project WHERE username = '$username'";   
    $result = $conn->query($sql);
    
    $sql = "DELETE FROM logindetails WHERE username = '$username'";   
    $result = $conn->query($sql);

?>

