<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="simple_crud"; 

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

/*
  *You can not specify <dbname> it will still work
  *$conn = mysqli_connect($servername, $username, $password);
*/

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully <br>";
