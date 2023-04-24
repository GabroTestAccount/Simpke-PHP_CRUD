<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "simple_crud";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$stmt = $conn->prepare("INSERT INTO students (first_name,last_name,age) VALUES (?,?,?)");
$stmt->bind_param("sss", $first_name,$last_name,$age);
/*
    *s string
    *i integer
    *d double
*/
// set parameters and execute
$first_name = "John";
$last_name = "makoony";
$age = "44";
$stmt->execute();

$first_name = "Mary";
$last_name = "roze";
$age = "64";
$stmt->execute();

$first_name = "Julie";
$last_name = "dahma";
$age = "43";
$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();
?>