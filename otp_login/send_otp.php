<?php

  // Start session   
  session_start();

  // Include database connection file

  include_once('config.php');

  // Send OTP to email Form post
  if (isset($_POST['email'])) {
      
      $email  = $con->real_escape_string($_POST['email']);
      $otp    = mt_rand(1111, 9999);
      $query  = "SELECT * FROM users WHERE email = '$email'";
      $result = $con->query($query);

      if ($result->num_rows > 0) {
          $con->query("UPDATE users SET otp = '$otp' WHERE email = '$email'");
          sendMail($email, $otp);
          $_SESSION['EMAIL'] = $email; 
          echo "yes";
      }else{
          echo "no";
      }            
  }


  // Create function for send email

  function sendMail($to, $msg){

    require 'PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;
    
    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'alok2002shukla@gmail.com';         // SMTP username
    $mail->Password = '222002alok';                       // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->setFrom('FromEmail', 'OTP Verification');
    $mail->addAddress($to, 'OTP Verification');           // Add a recipient
   
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
      )
    );

    $mail->Subject = '('.$msg.')OTP Verification - KRYPTON';
    $mail->Body    = 'Your verification OTP Code is <b>'.$msg.'</b>';
    
    if($mail->send()) {
        return true;
    } else {
        return false;
    }
    
  }

?>