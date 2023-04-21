<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "simple_crud";

// Create connection
/*
  *You may not specify <dbname> it will still work
  *$conn = mysqli_connect($servername, $username, $password);
*/
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully <br>";

//connect with [ mysqli ( procedural ) ]  >> >> >> >> >> >> 
/*
$conn = new mysqli($servername, $username, $password);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
*/


//connect with [PDO]  >> >> >> >> >> >> 
/*
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }
*/


