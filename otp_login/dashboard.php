<?php

include_once "fetching_data.php"; //stored data

if (isset($_SESSION['IS_LOGIN'])) {
  //nothing	
}
else{
	header("Location:login.php"); //forcing back to login page
	die();
}
?>

<h1><?php echo $name ?></h1>
<br><br>
<p><a href="logout.php">Logout</a></p>


