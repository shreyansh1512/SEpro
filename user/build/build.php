<?php
session_start();
if(!isset($_SESSION['loggedIn']) && !$_SESSION['loggedIn']){
   header("location:../../index.html");
}
?>

<?php 
require ('../../authenticate/connect.php');
$username = $_SESSION['username'];
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
    <link rel="stylesheet" href="buildcss">
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

            <label for="">About</label><br><br>
          <?php 
            $sql = "SELECT * FROM about WHERE username = '$username'";
            $result = $conn->query($sql);
            $row = mysqli_fetch_assoc($result);
            if(mysqli_num_rows($result)===0){
          ?>
            <textarea type="text" id="about" placeholder=" Enter here" rows="3" ></textarea><br><br>
          <?php }else{ ?>
           <textarea type="text" id="about" rows="3"><?php echo $row['about'] ?></textarea><br><br>
          <?php } ?>

            <label for="" >Skills</label><br><br>

            <div id = "techs">
            <label for="" >Techinal Skills</label><br><br>

          <?php 
            $sql = "SELECT * FROM technical WHERE username = '$username'";
            $result = $conn->query($sql);
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if(mysqli_num_rows($result)===0){
          ?>
            <input type="text" id="tech1" placeholder=" Skill 1" rows="3" class=" form-control sField"></input>
            <input type="text" id="tech2" placeholder=" Skill 2" rows="3" class=" form-control sField"></input>
            <input type="text" id="tech3" placeholder=" Skill 3" rows="3" class=" form-control sField"></input><br>
            <input type="text" id="tech4" placeholder=" Skill 4" rows="3" class=" form-control sField"></input>
            <input type="text" id="tech5" placeholder=" Skill 5" rows="3" class=" form-control sField"></input>
          <?php }else{ 
                foreach ($rows as $row) {
          ?>
            
          <input type="text" id=<?php echo $row['serial#'] ?> rows="3" class=" form-control sField" value = " <?php echo $row['skill'] ?>"></input>
          <?php if($row['serial#']=== 'tech3'){ ?> <br> <?php } ?>
          <?php }
            }     
          ?>

            </div><br>

            
            <div id = "Ntechs">
            
            <label for="" >Non-Techinal Skills</label><br><br>

           <?php 
            $sql = "SELECT * FROM nonTechnical WHERE username = '$username'";
            $result = $conn->query($sql);
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if(mysqli_num_rows($result)===0){
          ?>
            <input type="text" id="Ntech1" placeholder=" Skill 1" rows="3" class=" form-control sField"></input>
            <input type="text" id="Ntech2" placeholder=" Skill 2" rows="3" class=" form-control sField"></input>
            <input type="text" id="Ntech3" placeholder=" Skill 3" rows="3" class=" form-control sField"></input><br>
            <input type="text" id="Ntech4" placeholder=" Skill 4" rows="3" class=" form-control sField"></input>
            <input type="text" id="Ntech5" placeholder=" Skill 5" rows="3" class=" form-control sField"></input>
          <?php }else{ 
                foreach ($rows as $row) {
          ?>
            
          <input type="text" id=<?php echo $row['serial#'] ?> rows="3" class=" form-control sField" value = " <?php echo $row['skill'] ?>"></input>
          <?php if($row['serial#']=== 'Ntech3'){ ?> <br> <?php } ?>
          <?php }
            }     
          ?>


            </div>

                    
          </div>

          <div class="charts-card">
            <h2> Projects </h2>


            <?php 
            $sql = "SELECT * FROM project WHERE username = '$username'";
            $result = $conn->query($sql);
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if(mysqli_num_rows($result)===0){
            ?>

            <h3> Project 1 </h3>
            <label for="">Project Name</label><br>
            <input type="text" id="pron1" placeholder=" Enter here" rows="3" style="width: 60%;"></input><br><br>
            <label for="" >Project description</label><br>
            <textarea id="prod1" type="text" placeholder=" Enter here" rows="3" ></textarea><br>
            <label for="">Project Link</label><br>
            <input type="text" id="prol1" placeholder=" Enter here" rows="3" style="width: 60%;"></input><br>

            <h3> Project 2 </h3>
            <label for="">Project Name</label><br>
            <input type="text" id="pron2" placeholder=" Enter here" rows="3" style="width: 60%;"></input><br><br>
            <label for="" >Project description</label><br>
            <textarea id="prod2" type="text" placeholder=" Enter here" rows="3" ></textarea><br>
            <label for="">Project Link</label><br>
            <input type="text" id="prol2" placeholder=" Enter here" rows="3" style="width: 60%;"></input><br>


          <?php }else{ 
           foreach ($rows as $row) {  
          ?>          

            <h3> Project <?php echo $row['serial#'] ?> </h3>
            <label for="">Project Name</label><br>
            <input type="text" id="pron<?php echo $row['serial#'] ?>" rows="3" style="width: 60%;" value=" <?php echo $row['pron'] ?>"></input><br><br>
            <label for="" >Project description</label><br>
            <textarea id="prod<?php echo $row['serial#'] ?>" type="text" placeholder=" Enter here" rows="3" ><?php echo $row['prod'] ?></textarea><br>
            <label for="">Project Link</label><br>
            <input type="text" id="prol<?php echo $row['serial#'] ?>" value=" <?php echo $row['pron'] ?>" rows="3" style="width: 60%;"></input><br>          

          <?php 
           }
          }     
          ?>
            <!--div class="container mt-2 text-center " id="sAddButton">
              <button onclick="addNewSfield()" class="btn btn-primary btn-small">Add</button>
            </div-->

          </div>

        </div>
      
        <p style="color:green;" id="saved" ></p>

        <input
          type="submit"
          id="button"
          name="commit"
          value="Submit"
          tabindex="3"
          onclick="save(document.getElementById('about').value,

                        document.getElementById('tech1').value,
                        document.getElementById('tech2').value,
                        document.getElementById('tech3').value,
                        document.getElementById('tech4').value,
                        document.getElementById('tech5').value,

                        document.getElementById('Ntech1').value,
                        document.getElementById('Ntech2').value,
                        document.getElementById('Ntech3').value,
                        document.getElementById('Ntech4').value,
                        document.getElementById('Ntech5').value,

                        document.getElementById('pron1').value,
                        document.getElementById('prod1').value,
                        document.getElementById('prol1').value,

                        document.getElementById('pron2').value,
                        document.getElementById('prod2').value,
                        document.getElementById('prol2').value)"

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
