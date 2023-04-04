<?php
session_start();
if(!isset($_SESSION['loggedIn']) && !$_SESSION['loggedIn']){
   header("location:../../index.html");
}
?>

<?php 
require ('../../authenticate/connect.php');
$username = $_SESSION['username']; 

$sql = "SELECT * FROM about WHERE username = '$username'";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);


$sql1 = "SELECT * FROM project WHERE username = '$username'";
$result1 = $conn->query($sql1);
$row1 = mysqli_fetch_assoc($result1);

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Student Portfolio</title>

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
        <div class="header-right">
          <div class="profile-icon">
            <span class="material-icons-outlined">account_circle</span>
          <div class="dropdown-menu">
            <ul>
              <li><a href="build">Build</a></li>
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

          <?php 
            if(mysqli_num_rows($result)===0 && mysqli_num_rows($result1)===0){
          ?>
            <h2> Build Your Portfolio </h2>
          <?php } ?>  
          
         <div class="charts">

        <?php 
          if(mysqli_num_rows($result)===1){
        ?>
          <div class="charts-card">
            <h2> Personal Information </h2>

            <label for=""><b> About </b></label><br>           
            <p><?php echo $row['about'] ?>  </p> <br><br>

            <label for="" ><b>Skills</b></label><br><br>

            <div id = "techs">
            <label for="" ><b>Techinal Skills</b></label><br>
            <p><?php echo $row['tech'] ?> </p><br>
            </div>

            
            <div id = "Ntechs">
            <label for="" ><b>Non-Techinal Skills</b></label><br>
            <p><?php echo $row['Ntech'] ?>  </p>
            </div>
 
          </div>
        <?php } ?>

        <?php 
          if(mysqli_num_rows($result1)===1){
        ?>
          <div class="charts-card">
            <h2> Projects </h2>            
                      
            <label for="" ><b>Project description</b></label><br>
            <p><?php echo $row1['prod'] ?>  </p>
            <label for=""><b>Project Link</label></b><br>
            <p><a href="<?php echo $row1['prol'] ?>">link to the project</a></p><br>

          </div>
        <?php } ?> 
        </div>

              

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
