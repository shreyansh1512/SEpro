<?php
session_start();
if(!isset($_SESSION['loggedIn']) && !$_SESSION['loggedIn']){
   header("location:../index.html");
}
?>

<?php 
require ('../authenticate/connect.php');
$name = $_SESSION['displayname'];

?>

<!doctype html>
<html lang="en">
  <head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="profile.js"></script>
  </head>

  <body>
    <h1 class="text-center">Welcome 	
      <?php echo $_SESSION['displayname']; ?> <br>
        This is an admin profile
    </h1>
    <input type="text" id="search" placeholder="Search...">
    <div id="results"></div>
  </body>
</html>


