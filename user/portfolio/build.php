<?php
session_start();
if(!isset($_SESSION['loggedIn']) && !$_SESSION['loggedIn']){
   header("location:../../index.html");
}
?>

<?php 
require ('../../authenticate/connect.php');
$name = $_SESSION['displayname'];
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Student Portfolio</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="portfoliocss">
  </head>
  <body>
    <div class="grid-container">

      <!-- Header -->
      <header class="header">
            <h2> Build your portfolio </h2>    
        <div class="header-right">
          <div class="profile-icon">
            <span class="material-icons-outlined">account_circle</span>
          <div class="dropdown-menu">
            <ul>
              <li><a href="portfolio">Portfolio</a></li>
              <li><a href="#">Settings</a></li>
              <li><a href="editProfile">Edit profile</a></li>
              <li><a href="user/logout.php">Logout</a></li>
            </ul>
          </div>
          </div>        
        </div>
      </header>
      <!-- End Header -->

     
      <!-- Main -->
      <main class="main-container">

        <div class="charts">

          <div class="charts-card">
            <h2> Personal Information </h2>

            <label for="">About</label><br>
            <textarea type="text" id="about" placeholder=" Enter here" rows="3" ></textarea><br><br>

            <label for="" >Skills</label><br><br>

            <div id = "techs">
            <label for="" >Techinal Skills</label></br>
            <input type="text" id="tech" placeholder=" Enter here" rows="3" class=" form-control sField"></input>
            </div><br>

            <!-- new -textarea will be added here dynamically >
            <div class="container mt-2 text-center " id="sAddButton">
              <button onclick="addNewSfield()" class="btn btn-primary btn-small">Add</button>
            </div><br-->

            <div id = "Ntechs">
            <label for="" >Non-Techinal Skills</label><br>
            <input type="text" id="Ntech" placeholder=" Enter here" rows="3" class=" form-control sField"></input>
            </div>

            <!-- new -textarea will be added here dynamically -->
            <!--button onclick="addInput()" class="btn btn-primary btn-small">Add</button-->
        
          </div>

          <div class="charts-card">
            <h2> Projects </h2>

            <label for="" >Project description</label><br>
            <textarea id="prod" type="text" placeholder=" Enter here" rows="3" ></textarea><br>
            <label for="">Project Link</label><br>
            <input type="text" id="prol" placeholder=" Enter here" rows="3" ></input><br>

            <!--div class="container mt-2 text-center " id="sAddButton">
              <button onclick="addNewSfield()" class="btn btn-primary btn-small">Add</button>
            </div-->

          </div>

        </div>
      
        <p style="color:red;" id="saved" ></p>
        <input
          type="submit"
          id="button"
          name="commit"
          value="Submit"
          tabindex="3"
          onclick="save(document.getElementById('about').value, document.getElementById('tech').value, 
                          document.getElementById('Ntech').value,document.getElementById('prod').value,document.getElementById('prol').value)"
          class="lastInput"
        />
      
      </main>
      <!-- End Main -->

    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="portfoliojs"></script>
  </body>
</html>
