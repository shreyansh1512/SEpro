<?php
session_start();
if(!isset($_SESSION['loggedIn']) && !$_SESSION['loggedIn']){
   header("location:../../index.html");
}
?>

<?php 
require ('../../authenticate/connect.php');

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Edit Profile</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="dashcss">
  </head>
  <body>
    <div class="grid-container">

      <!-- Header -->
      <header class="header">
        <h2> Change Password </h2>       
        <div class="header-right">
          <div class="profile-icon">
            <span class="material-icons-outlined">account_circle</span>
          <div class="dropdown-menu">
            <ul>
              <li><a href="admindash">Dashboard</a></li>
              <li><a href="../../user/logout.php">Logout</a></li>
            </ul>
          </div>
          </div>        
        </div>
      </header>
      <!-- End Header -->

     
      <!-- Main -->
      <main class="main-container">

        <div class="main-title">
        
        <div class="charts">
          <div class="charts-card">
          <div class="form">
        
        <label for="curpass">Current Password</label>
        <input type="password" name="curpass" id="curpass" tabindex="1" />
        <span style="color:red;" id="curr-error"></span><br><br>

        <label for="password">New Password</label>
        <input type="password" name="password" id="password" tabindex="1" />
        <span style="color:red;" id="password-error"></span><br><br>

        <label for="check_password">Confirm Password</label>
        <input type="password" name="check_password" id="check_password" tabindex="1" />
        <span style="color:red;" id="confirm-error"></span><br><br>             

        <input
          type="submit"
          id="button"
          value="Save"
          tabindex="3"
          onclick="validate(document.getElementById('curpass').value, document.getElementById('password').value, document.getElementById('check_password').value)"
          class="lastInput"
        />
</div>
</div>
</div>


        </div>

      </main>
      <!-- End Main -->

    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="dashjs"></script>
  </body>
</html>
