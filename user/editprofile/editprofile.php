<?php
session_start();
if(!isset($_SESSION['loggedIn']) && !$_SESSION['loggedIn']){
   header("location:../index.html");
}
?>

<?php 
require ('../../authenticate/connect.php');
$name = $_SESSION['displayname'];
$username = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Edit Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="editProfilecss">
  </head>
  <body>
    <div class="grid-container">

      <!-- Header -->
      <header class="header">
        <h2> Edit Profile </h2>       
        <div class="header-right">
          <div class="profile-icon">
            <span class="material-icons-outlined">account_circle</span>
          <div class="dropdown-menu">
            <ul>
              <li><a href="portfolio">Portfolio</a></li>
              <li><a href="user/logout.php">Logout</a></li>
            </ul>
          </div>
          </div>        
        </div>
      </header>
      <!-- End Header -->

     
      <!-- Main -->
      <main class="main-container">
          
        
<div class="row flex-lg-nowrap">

  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">

              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                <h3> Edit Profile </h3>       

                  <!--div class="mx-auto" style="width: 140px;">
                    <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                      <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
                    </div>
                  </div>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $name ?></h4>
                    <div class="mt-2">
                      <button class="btn btn-primary" type="button">
                        <i class="fa fa-fw fa-camera"></i>
                        <span>Change Photo</span>
                      </button>
                    </div>
                  </div-->
                </div>
              </div>

              <div class="tab-content pt-3">
                <div class="tab-pane active">

                      
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Full Name</label>
                              <input class="form-control" type="text" id="name" value="<?php echo $name ?>">
                              <p id="name-error" style="color: red; font: bold;"></p> 
                            </div>
                          </div>
                          <div class="col">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col">
<?php
$sqlSocial = "SELECT * FROM handles WHERE username = '$username'";
$resultsocial = $conn->query($sqlSocial);

$rowsocial = mysqli_fetch_assoc($resultsocial);

?>
                          <br><h6><b>Social Handles</b></h6>
                            
                            <div class="form-group">
                              <label>Github</label>
                              <input class="form-control" type="text" id="git" value="<?php if(mysqli_num_rows($resultsocial)===1){ echo $rowsocial['git']; } ?>">
                            </div>
                            <div class="form-group">
                              <label>Instagram</label>
                              <input class="form-control" type="text" id="insta" value="<?php if(mysqli_num_rows($resultsocial)===1){ echo $rowsocial['insta']; } ?>">
                            </div>
                            <div class="form-group">
                              <label>Twitter</label>
                              <input class="form-control" type="text" id="twit" value="<?php if(mysqli_num_rows($resultsocial)===1){ echo $rowsocial['twit']; } ?>">
                            </div>
                            <div class="form-group">
                              <label>Facebook</label>
                              <input class="form-control" type="text" id="face" value="<?php if(mysqli_num_rows($resultsocial)===1){ echo $rowsocial['face']; } ?>">
                            </div>

                          </div>
                          <div class="col">
                          </div>
                        </div>
                    <br> 
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-12 col-sm-6 mb-3">

                    <div class="mb-2"><b>Privacy Preferences</b></div>
                        <div class="row">
                          <div class="col">
                            <div class="custom-controls-stacked px-2">
                              
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="Hskill" value="false" onchange="if(this.checked) this.value='true'; else this.value='false';">
                                <label class="custom-control-label" for="notifications-news">Hide non technical skills</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="Hhandle" value="false" onchange="if(this.checked) this.value='true'; else this.value='false';">
                                <label class="custom-control-label" for="notifications-offers">Hide Social handles</label>
                                <br>
                                <br>
                                <p id="detailpro" style="color: red; font: bold;"></p>
                                
                                
                                <input
                          type="submit"
                          id="button"
                          value="Save Info"
                          tabindex="3"
                          onclick="ChangeInfo(

                            document.getElementById('name').value,
                            document.getElementById('git').value,
                            document.getElementById('insta').value,
                            document.getElementById('twit').value,
                            document.getElementById('face').value,

                            document.getElementById('Hskill').value,
                            document.getElementById('Hhandle').value
                          )"

                          class="btn btn-primary"
                        />

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>


                    <div class="col-12 col-sm-5 offset-sm-1 mb-3">

                      <div class="mb-2"><b>Change Password</b> 

                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Current Password</label>
                              <input class="form-control" type="password" id="curr">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>New Password</label>
                              <input class="form-control" type="password" id="newpass">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                              <input class="form-control" type="password" id="confpass"></div>
                          </div>
                        </div>
                      </div>
                      <p id="passpro" style="color: red; font: bold;"></p>
                    </div>

                    <div class="row">
                      
                      <div class="col d-flex justify-content-end">
                        <input
                          type="submit"
                          id="button"
                          value="Change Password"
                          tabindex="3"
                          onclick="ChangePass(

                            document.getElementById('curr').value,
                            document.getElementById('newpass').value,
                            document.getElementById('confpass').value,

                          )"

                          class="btn btn-primary"
                        />

                      </div>

                    </div>

                </div>
              </div>
            </div>
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
    <script src="editProfilejs"></script>
  </body>
</html>
