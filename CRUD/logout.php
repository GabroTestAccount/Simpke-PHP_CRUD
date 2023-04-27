<?php

session_start();
session_unset();
session_destroy();

$_SESSION['success_msg']= 'you logged out successfully';
header("location:../login.php");

