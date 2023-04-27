<?php

session_start();
include('../connect.php');


if (isset($_POST['add-Student'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
}

if (empty($first_name) && empty($last_name)) {
    $_SESSION['failed_msg']= 'please input all fields';
    header('location:../students.php');
} else {

    $query = "INSERT INTO students (first_name,last_name,age)
    VALUES ('$first_name','$last_name','$age')";

    $result = mysqli_query($conn, $query);
    if (!$result) {
        die('The query is failed' . mysqli_error($conn));
    } else {
        $_SESSION['success_msg'] = 'your data has been added successfully';
        header('location:../students.php');
    }
}
