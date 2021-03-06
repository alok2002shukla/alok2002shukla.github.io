<?php

session_start();

if (isset($_SESSION['IS_LOGIN'])) {
	header("Location:dashboard.php");
	die();		
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration & Login with Email OTP verification using Jquery AJAX with PHP Mysql</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>

<div class="card text-center" style="padding:20px;">
  <h3>Registration & Login with Email OTP verification using Jquery AJAX with PHP Mysql</h3>
</div><br>

<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
      <div class="col-md-6">        
        <form id="submitForm">

          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name" required="">
          </div>

          <div class="form-group">
            <label for="name">Date of birth:</label>
            <input type="date" class="form-control" name="dob" placeholder="Enter dob" required="">
          </div>

          <div class="form-group">  
            <label for="email">Email: (used for OTP login)</label>
            <input type="text" class="form-control" name="email" placeholder="Enter Email" required="">
          </div>

          <div class="form-group">  
            <label for="mobile">Mobile Number:</label>
            <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile number" required="">
          </div>
          
          <div class="form-group">
            <p>Already have account ?<a href="login.php"> Login</a></p>
            <button type="submit" class="btn btn-primary">Sign Up</button>
          </div>
        </form>
      </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $("#submitForm").on("submit", function(e){
      e.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
        url  : "signup.php",
        type : "POST",
        cache:false,
        data : formData,
        success:function(result){
          if (result == "yes") {
            alert("Registration sucessfully Please login");
            window.location ='login.php';          
          }else{
            alert("Registration failed try again!");
          }          
        }
      });  
    });    
  });
</script>
</body>
</html>



