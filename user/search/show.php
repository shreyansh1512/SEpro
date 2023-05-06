<?php
session_start();
if(!isset($_SESSION['loggedIn']) && !$_SESSION['loggedIn']){
   header("location:../../index.html");
}
?>

<?php 
require ('../../authenticate/connect.php');
$username = $_POST['search']; 


$sql = "SELECT * FROM about WHERE username = '$username'";
$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Student Portfolio</title>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

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
        <h2> Portfolio </h2>
        <div class="header-left">
          <span class="material-icons-outlined">search</span>
        </div>
        
        <div class="search-bar">
        <form action="showsearch" method="POST">
        <input type="text" id="search" placeholder="Search..." autocomplete="off">
        <span class="material-icons-outlined close-icon">close</span>
        </form>

        <div id="results"></div> 
        </div>    
        
        
        <div class="header-right">
          <div class="profile-icon">
            <span class="material-icons-outlined">account_circle</span>
          <div class="dropdown-menu">
            <ul>
              <li><a href="build">Build</a></li>
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

          <?php 
            if(mysqli_num_rows($result)===0){
          ?>
          <div class="start">
            <h1>The user has not created a portfolio yet</h1>
          </div>
          <?php }else{  ?>

        <div class="container">
        <div class="main-body">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        
              <!-- /Breadcrumb -->
        
              <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">

                        <img src="../../img/userprofile.avif" alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
<?php
$sql = "SELECT * FROM logindetails WHERE username = '$username'";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$nameuser = $row['name'];             
?>
                        <h4><?php echo $nameuser ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
<?php
$sqlSocial = "SELECT * FROM handles WHERE username = '$username'";
$resultsocial = $conn->query($sqlSocial);

$rowsocial = mysqli_fetch_assoc($resultsocial);

$flags = "SELECT * FROM flags WHERE username = '$username'";
$resultflag = $conn->query($flags);

$rowflag = mysqli_fetch_assoc($resultflag);

?>


                  <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                        <span class="text-secondary"><?php if(mysqli_num_rows($resultsocial)===1 && $rowflag['social']==='false'){ echo $rowsocial['git']; } ?></span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                        <span class="text-secondary"><?php if(mysqli_num_rows($resultsocial)===1 && $rowflag['social']==='false'){ echo $rowsocial['twit']; } ?></span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                        <span class="text-secondary"><?php if(mysqli_num_rows($resultsocial)===1 && $rowflag['social']==='false'){ echo $rowsocial['insta']; } ?></span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                        <span class="text-secondary"><?php if(mysqli_num_rows($resultsocial)===1 && $rowflag['social']==='false'){ echo $rowsocial['face']; } ?></span>
                      </li>
                    </ul>
                  </div>
                </div>

                <div class="col-md-8">
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="col-sm-9 text-secondary"><h5><b> ABOUT </b></h5></div>
<?php

$sql = "SELECT * FROM about WHERE username = '$username'";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);

?>
                      <p> <?php echo $row['about'] ?> </p>
                    </div>
                  </div>
    
                  <div class="row gutters-sm">
                    <div class="col-sm-6 mb-3">
                      <div class="card h-100">
                        <div class="card-body">
                          <h6 class="d-flex align-items-center mb-3"><b class="material-icons text-info mr-2">Technical Skills</b></h6>
<?php

$sql = "SELECT * FROM technical WHERE username = '$username'";
$result = $conn->query($sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($rows as $row) {
?>
                          <small> <?php echo $row['skill'] ?> </small><br>

<?php } ?>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6 mb-3">
                      <div class="card h-100">
                        <div class="card-body">
                          <h6 class="d-flex align-items-center mb-3"><b class="material-icons text-info mr-2">Non - Technichal  Skills</b></h6>

<?php

$sql = "SELECT * FROM nonTechnical WHERE username = '$username'";
$result = $conn->query($sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($rows as $row) {
?>
                          <small> <?php if($rowflag['Ntech']=='false'){ echo $row['skill']; } ?> </small><br>

<?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>


              <div class="row">
               <h5> Projects </h5>
              </div>

                      <div class="row">

<?php

$sql = "SELECT * FROM project WHERE username = '$username'";
$result = $conn->query($sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($rows as $row) {
?>
                          <div class="col-md-6">
                            <div class="card h-100">
                              <div class="card-body">
                                    
                              <h5 style="color:red;"><a style="text-decoration: none;" href=<?php echo $row['prol'] ?>><?php echo $row['pron'] ?></a></h5>    
                              <p><?php echo $row['prod'] ?></p>
                              
                              </div>
                            </div> 
                          </div>

<?php } ?>
                      
                      <div> 
                 </div>
            </div>
          </div>
          </div>
     
    
    
                </div>
              </div>
    
            </div>
        </div>

        <?php } ?>

      
              

      </main>
      <!-- End Main -->

    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Custom JS -->
    <script src="portfoliojs"></script>
  </body>
</html>
