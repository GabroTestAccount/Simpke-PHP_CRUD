<?php
session_start();
include('../connect.php');

if (isset($_POST['update'])) {
    $id = $_SESSION['id'];
    $name =  ucwords($_POST['name']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    if ($password !== $confirm_password) {
        header('location:../admins_account.php?failed_msg=Password and confirm password are not identical');
        exit;
    } else {
        $pass_hash = password_hash($password, PASSWORD_DEFAULT);
    }

    $query = "UPDATE admins SET name ='$name',password='$pass_hash' where id='$id'";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die('Error' . mysqli_error($conn));
    } else {
        header("location:../admins_account.php?success_msg=you profile has updated successfully");
    }
}
