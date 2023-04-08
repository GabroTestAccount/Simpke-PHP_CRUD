<?php

include('../connect.php');
include('../layout/header.php');
include('../layout/footer.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select_query = "SELECT * from students where id = $id";
    $select_result = mysqli_query($conn, $select_query);

    if (!$select_result) {
        die('Error' . mysqli_error($conn));
    } else {
        $row = mysqli_fetch_assoc($select_result);
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $age = $row['age'];
    }
}
if (isset($_POST['update_Student'])) {
    if (isset($_GET['student_id'])) {
        $student_id = $_GET['student_id'];
        echo '<h1>yess </h1>';
    }
    $first_name1 = $_POST['first_name'];
    $last_name1 = $_POST['last_name'];
    $age1 = $_POST['age'];

    $query = "UPDATE students SET 
        first_name='$first_name1',
        last_name='$last_name1',
        age='$age1' 
    WHERE
        id = $student_id";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die('Error' . mysqli_error($conn));
    } else {
        header('location:../index.php?success_msg=your data has been updated successfully');
    }
}

?>
<div class=" text-light text-center bg-dark">
    <div class="row">
        <div class="col">
            <h1>Update page</h1>
        </div>
    </div>
</div>
<br>
<form action="update_student.php?student_id=<?php echo $id; ?>" method="POST">
    <div class="container">
        <div class="card">
            <div class="card-body ">
                <div class="row ">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" id="first_name" class="form-control" name="first_name" value="<?php echo $row['first_name']; ?>" placeholder="Write your first name">
                </div>
                <div class="row ">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" id="last_name" class="form-control" name="last_name" value="<?php echo $row['last_name']; ?>" placeholder="Write your last name">
                </div>

                <div class="row ">
                    <label for="age" class="form-label">Age</label>
                    <input type="text" id="age" class="form-control" name="age" value="<?php echo $row['age']; ?>" placeholder="Write your age">
                </div>
            </div>
            <div class="card-footer text-muted">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" name="update_Student" class="btn btn-success" value="Update"></button>
            </div>
        </div>

</form>
<?php include('../layout/footer.php');
