<?php

	// Database configuration 	
	$hostname = "sql302.epizy.com"; 
	$username = "epiz_26845346"; 
	$password = "8HJeyZjF0yn"; 
	$dbname   = "epiz_26845346_krypton";

	//$hostname = "localhost"; 
	//$username = "root"; 
	//$password = ""; 
	//$dbname   = "krypton";
	 
	// Create database connection 
	$con = new mysqli($hostname, $username, $password, $dbname); 
	 
	// Check connection 
	if ($con->connect_error) { 
	    die("Connection failed: " . $con->connect_error); 
	}

?>