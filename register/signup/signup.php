<?php
require('../../authenticate/connect.php');

$email = $_GET['email'];
$token = $_GET['token'];
$currentDate = date("Y-m-d H:i:s");

$check_token = "SELECT * FROM registration WHERE email = '$email' AND token = '$token' ";
$result = $conn->query($check_token);

?>

        <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="signup.css"  rel="stylesheet"/>
    <script src="verify.js"></script>
    <title>Verify Email</title>
  </head>

<?php 

if($result->num_rows === 1){
    $row = $result->fetch_assoc();
    if($row['expiryDate'] >= $currentDate ){

      $username = substr($email, 0, 10);
      $department = substr($username, 1, 2);
?>

 
  <body>
    <div class="main">
      <div class="header">
        <img src="https://upload.wikimedia.org/wikipedia/en/2/2e/Indian_Institute_of_Information_Technology%2C_Allahabad_Logo.png" alt="" width="120" height="120" />
      </div>
        
      <div class="signUp">
        Register 
      </div>
    <form action="save.php" method="GET">
      <div class="form">
              
        <label for="name">Full Name</label>
        <input type="text" name="name" id="name" placeholder=" Full Name" tabindex="1" />
      
        <label for="username">Username</label>
        <input type="text" name="username" id="username" tabindex="1" value="<?php echo $username; ?>" disabled/>
      
      
        <label for="password">Password</label>
        <input type="password" name="password" id="password" tabindex="1" />

        <label for="check_password">Confirm Password</label>
        <input type="password" name="check_password" id="password" tabindex="1" />

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
