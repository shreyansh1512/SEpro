<?php		
    // connect to the database
    $host = "localhost";
    $user = "";
    $pass = "";
    $dbname = "";
    $conn = mysqli_connect($host, $user, $pass, $dbname);

    // check if connection is successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
	
?>
