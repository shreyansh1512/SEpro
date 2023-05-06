<?php

require ('../../authenticate/connect.php');

$username = $_POST['username'];

    
    $sql = "DELETE FROM logindetails WHERE username = '$username'";   
    $result = $conn->query($sql);

?>

