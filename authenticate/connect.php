<?php		
    // connect to the database
    $host = "localhost";
    $user = "shreyansh";
    $pass = "";
    $dbname = "SEpro";
    $conn = mysqli_connect($host, $user, $pass, $dbname);

    // check if connection is successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
	
?>
