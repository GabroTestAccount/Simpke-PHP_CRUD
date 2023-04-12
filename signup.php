<?php


session_start();
$_SESSION['current_page']= "signup";

include('connect.php');
include('layout/header.php');

?>
<div class="row text-light text-center bg-dark">
    <div class="col">
        <h1>Sign up</h1>
    </div>
</div>
<br>
<!-- Failed Message -->
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

<div class="d-flex justify-content-center">

    <div class="card text-center " style="width: 28rem;">
        <div class="card-header bg-info">
            welcome in our site
        </div>
        <div class="card-body">
            <form action="CRUD/signup-access.php" method="POST">
                <div class="row ">
                    <label for="name" class="form-label">name</label>
                    <input type="text" id="name" class="form-control" name="name" value="" placeholder="Write your name" required>
                </div>
                <div class="row ">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" class="form-control" name="email" value="" placeholder="Write your email" required>
                </div>
                <div class="row ">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" class="form-control" name="password" value="" placeholder="Write your password" required>
                </div>
                <div class="row ">
                    <label for="confirm_password" class="form-label">Confirm password</label>
                    <input type="password" id="confirm_password" class="form-control" name="confirm_password" value="" placeholder="Confirm password" required>
                </div>

        </div>
        <div class="card-footer text-body-secondary">
            <input type="submit" name="signup" class="btn btn-info" value="Sign up">
        </div>
        </form>
    </div>

</div>


<?php

include('layout/footer.php');

?>