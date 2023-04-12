<?php


session_start();
include('../connect.php');

if (isset($_POST['login'])) {

    if (empty($_POST['email']) || empty($_POST['password'])) {
        header("location:../login.php?failed_msg=All fields are required");
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
                    header("location:../login.php?failed_msg=Email and password are not identical");
                } else {
                    $_SESSION['username'] = $admain['name'];
                    header("location:../index.php?success_msg=Logged in has been successfully");
                }
            } else {
                header("location:../login.php?failed_msg=Email and password are not identical");
            }
        }
    }
}
