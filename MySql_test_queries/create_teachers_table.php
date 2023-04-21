<?php 

include('../connect.php');

$create = "CREATE TABLE teachers (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL
)";
$result = mysqli_query($conn, $create);
if(!$result){
die('the statment is wrong :'.mysqli_error($conn));
}
echo "the statment is right :";