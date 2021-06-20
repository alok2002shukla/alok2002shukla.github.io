<?php

  // Include database connection file

  include_once('config.php');


  if (isset($_POST['email'])) {
    
    $name   = $con->real_escape_string($_POST['name']);
    $mobile = $con->real_escape_string($_POST['mobile']);
    $email  = $con->real_escape_string($_POST['email']);
    $dob    = $con->real_escape_string($_POST['dob']);

    $otp    = mt_rand(1111, 9999);

    $query  = "INSERT INTO users (name,email,mobile_number,dob,otp) VALUES ('$name','$email','$mobile','$dob','$otp')";
    $result = $con->query($query);

    if ($result) {
        echo "yes";
    }else{
        echo "no";
    }   

  }
  
  

?>