<?php

session_start();

include('connect.php');
include('layout/header.php');
$id = $_SESSION['id'];

$query = "SELECT * FROM admins where id =$id";
$result = mysqli_query($conn, $query);
if (!$result) {
    die('Error:' . mysqli_error($conn));
} else {
    $row = mysqli_fetch_assoc($result);
}

?>
<?php
if (isset($_GET['failed_msg'])) {
?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> <?php echo $_GET["failed_msg"]; ?> </strong> .
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>
<!-- Success Message -->
<?php
if (isset($_GET['success_msg'])) {
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> <?php echo $_GET["success_msg"]; ?> </strong> .
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>
<div class="container">
    <form action="CRUD/edit_admin_profile.php" method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="name" name="name" class="form-control" id="name" aria-describedby="nameHelp" value="<?php echo $row['name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" value="<?php echo $row['email']; ?>" readonly>
            <small id="emailHelp" style="color: red;" class="form-text">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm password</label>
            <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Password" required>
        </div>
        <br>
        <div class="form-group">
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>


<?php include('layout/footer.php'); ?>