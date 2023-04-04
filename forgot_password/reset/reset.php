<?php

session_start();
require('../../authenticate/connect.php');

$email = $_GET['email'];
$token = $_GET['token'];
$currentDate = date("Y-m-d H:i:s");

$check_token = "SELECT * FROM forgot WHERE email = '$email' AND token = '$token' ";
$result = $conn->query($check_token);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="reset.css"  rel="stylesheet"/>
    <script src="reset.js"></script>
    <title>Reset Password</title>
  </head>

<?php 

if($result->num_rows === 1){
    $row = $result->fetch_assoc();
    if($row['expiryDate'] >= $currentDate ){
      $_SESSION['email'] = $email;
?>

 
  <body>
    <div class="main">
      <div class="header">
        <img src="https://upload.wikimedia.org/wikipedia/en/2/2e/Indian_Institute_of_Information_Technology%2C_Allahabad_Logo.png" alt="" width="120" height="120" />
      </div>
        
      <div class="signUp">
        Reset Password 
      </div>
    <form action="save.php" method="GET" name = "reset" onsubmit="return validateForm()">
      <div class="form">
              
        <label for="password">New Password</label>
        <input type="password" name="password" id="password" tabindex="1" />
        <span style="color:red;" id="password-error"></span><br>

        <label for="check_password">Confirm Password</label>
        <input type="password" name="check_password" id="check_password" tabindex="1" />
        <span style="color:red;" id="confirm-error"></span><br>

        <p style="color:red;" id="test" hidden></p>
        <input
          type="submit"
          id="button"
          name="commit"
          value="Submit"
          tabindex="3"
          class="lastInput"
        />
      </div>
    </form>
      
    </div>
  </body>
</html>    
<?php    
    
    }  
}else echo "Link Expired";

?>
