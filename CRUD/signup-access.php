<?php

include('../connect.php');

if(isset($_POST['signup'])){

    $name= ucwords($_POST['name']);//each first letter after space become Upper 
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];

    if($password === $confirm_password){
        $pass_hash = password_hash($password, PASSWORD_DEFAULT);
    }
    $query="INSERT INTO admins (name,email,password)
            VALUES ('$name','$email','$pass_hash')";
    $result=mysqli_query($conn,$query);

    if(!$result){
        die("there is something wrong".mysqli_error($conn));
    }else{
        header('location:../login.php?success_msg=The email has added Successfully');
    }
}