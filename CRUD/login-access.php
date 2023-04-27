<?php


session_start();
include('../connect.php');

if (isset($_POST['login'])) {

    if (empty($_POST['email']) || empty($_POST['password'])) {
        $_SESSION['failed_msg'] = 'All fields are required';
        header("location:../login.php");
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT * FROM admins where email = '$email'";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die('there are some error' . mysqli_error($conn));
        } else {
            $row = mysqli_num_rows($result);
            if ($row === 1) {
                $admain = mysqli_fetch_assoc($result);
                if (!password_verify($password, $admain['password'])) {
                    $_SESSION['failed_msg']= 'Email and password are not identical';
                    header("location:../login.php");
                } else {
                    $_SESSION['username'] = $admain['name'];
                    $_SESSION['id'] = $admain['id'];
                    $_SESSION['success_msg'] = 'Logged in has been successfully';

                    header("location:../students.php");
                }
            } else {
                $_SESSION['failed_msg'] = 'Email and password are not identical';
                header("location:../login.php");
            }
        }
    }
}
