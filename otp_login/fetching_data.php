<?php

session_start();

if (isset($_SESSION['IS_LOGIN'])) {
	//echo "Hello" . "  ". "<b>" . ucwords($_SESSION['EMAIL']). "</b>";

    $email = $_SESSION['EMAIL']; //bringing email add. from login page
    
    
}

else{
	header("Location:login.php");
	die();
}

$servername = "sql302.epizy.com";
$username = "epiz_26845346";
$password = "8HJeyZjF0yn";
$dbname = "epiz_26845346_krypton";

//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "krypton";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT id, name, email,mobile_number,dob FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //storing fetched data in var
    $id = $row["id"];
    $name = $row["name"];
    $email = $row["email"];
    $mobile_number = $row["mobile_number"];
    $dob = $row["dob"];}
 } 

else {
  echo "0 results";
}
$conn->close();
?>



