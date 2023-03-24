<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/vendor/phpmailer/phpmailer/src/Exception.php';
require '../phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php';

require('connect.php');

$username = $_POST['username'];
$_SESSION['username'] = $username;
$sql = "SELECT * FROM logindetails WHERE username = '$username'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
   if(mysqli_num_rows($result)===0){
      echo "Invalid Username";
   }
   else{
      $emailnow = $row['email'];
      $namenow = $row['firstName'];
      $mail = new PHPMailer();
      $mail->IsSMTP();
      $mail->Mailer = "smtp";

      $mail->SMTPDebug  = 1;  
      $mail->SMTPAuth   = TRUE;
      $mail->SMTPSecure = "tls";
      $mail->Port       = 587;
      $mail->Host       = "smtp.gmail.com";
      $mail->Username   = "";
      $mail->Password   = "";

      $mail->IsHTML(true);
      $mail->AddAddress("$emailnow", "$namenow");
      $mail->SetFrom("", "");
      $mail->AddReplyTo("", "reply-to-name");
      $mail->AddCC("", "cc-recipient-name");
      $mail->Subject = "Test is Test Email sent via Gmail SMTP Server using PHP Mailer";
      $content = "<b>This is your OTP 5454.</b>";

      $mail->MsgHTML($content); 
      if(!$mail->Send()) {
         echo "Error while sending Email.";
         var_dump($mail);
      } else {
         header("Location:../user/reset.html");
      }   
   }

?>
