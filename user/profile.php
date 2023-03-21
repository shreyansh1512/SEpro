<?php
session_start();
if(!isset($_SESSION['loggedIn']) && !$_SESSION['loggedIn']){
   header("location:../index.html");
}
?>

<?php 
require ('../authenticate/connect.php');
$enroll = $_SESSION['displayname'];
?>

<!doctype html>
<html lang="en">
  <head>
    
  </head>

  <body>
	  <h1 class="text-center">Welcome 	
	  <?php echo $_SESSION['displayname']; ?>
    </h1>
   </body>
</html>
