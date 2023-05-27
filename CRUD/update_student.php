<?php

session_start();
include('../connect.php');
include('../layout/header.php');
// check from the accessibility
if (!isset($_SESSION['username'])) {
    $_SESSION['failed_msg'] = "you don't have access please login or sign up to enter this site";
    header("location:login.php");
}
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $_SESSION['failed_msg'] = "you can't change the url directly";
    header("location:../students.php");
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $select_query = "SELECT * from students where id = $id";
    $select_result = mysqli_query($conn, $select_query);

    if (!$select_result) {
        die('Error' . mysqli_error($conn));
    } else {
        $row = mysqli_fetch_assoc($select_result);
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $age = $row['age'];
    }
}
if (isset($_POST['update_Student'])) {

    if (isset($_POST['student_id'])) {
        $student_id = $_POST['student_id'];
    }
   
    $first_name1 = $_POST['first_name'];
    $last_name1 = $_POST['last_name'];
    $email1 = $_POST['email'];
    $age1 = $_POST['age'];

    $query = "UPDATE students SET 
        first_name='$first_name1',
        last_name='$last_name1',
        email = '$email1',
        age='$age1' 
    WHERE
        id = $student_id";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die('Error' . mysqli_error($conn));
    } else {
        $_SESSION['success_msg'] = "your data has been updated successfully";
        header('location:../students.php');
    }
}

?>
<div class="text-light text-center bg-dark">
    <div class="row">
        <div class="col">
            <h1>Update page</h1>
        </div>
    </div>
</div>
<br>
<form action="<?php echo htmlspecialchars('update_student.php?student_id=' . $id); ?>" method="POST">
    <div class="container">
        <div class="card">
            <div class="card-body ">
                <input type="hidden" name="student_id" value="<?php echo $row['id']; ?>">
                <div class="row ">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" id="first_name" class="form-control" name="first_name" value="<?php echo $row['first_name']; ?>" placeholder="Write your first name">
                </div>
                <div class="row ">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" id="last_name" class="form-control" name="last_name" value="<?php echo $row['last_name']; ?>" placeholder="Write your last name">
                </div>
                <div class="row ">
                    <label for="email" class="form-label">email</label>
                    <input type="email" id="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" placeholder="Write your email">
                </div>

                <div class="row ">
                    <label for="age" class="form-label">Age</label>
                    <input type="text" id="age" class="form-control" name="age" value="<?php echo $row['age']; ?>" placeholder="Write your age">
                </div>
            </div>
            <div class="card-footer text-muted">
                <input type="submit" name="update_Student" class="btn btn-success" value="Update"></button>
            </div>
        </div>

</form>
<?php include('../layout/footer.php');
