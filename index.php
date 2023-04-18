<?php

session_start();
$_SESSION['current_page']="Home";
include('connect.php');
include('layout/header.php');

?>
<h1>Welcome in our website</h1>



<?php include('layout/footer.php');?>