<?php

include('../connect.php');


if (isset($_POST['add-Student'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
}

if (empty($first_name) && empty($last_name)) {
    header('location:../index.php?failed_msg=please input all fields');
} else {

    $query = "INSERT INTO students (first_name,last_name,age)
    VALUES ('$first_name','$last_name','$age')";

    $result = mysqli_query($conn, $query);
    if(!$result){
        die('The query is failed'.mysqli_error($conn));
    }else{
        header('location:../index.php?success_msg=your data has been added successfully');
    }
}
