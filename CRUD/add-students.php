<?php

session_start();
include('../connect.php');


if (isset($_POST['add-Student'])) {

    if (empty($_POST['first_name']) && empty($_POST['last_name']) && empty($_POST['age'])) {
        $_SESSION['failed_msg'] = 'please input all fields';
        header('location:../students.php');
    } else {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $age = $_POST['age'];

        $query = "INSERT INTO students (first_name,last_name,email,age)
                    VALUES ('$first_name','$last_name','$email','$age')";

        $result = mysqli_query($conn, $query);
        if (!$result) {
            die('The query is failed' . mysqli_error($conn));
        } else {
            $_SESSION['success_msg'] = 'your data has been added successfully';
            header('location:../students.php');
        }
    }
}
