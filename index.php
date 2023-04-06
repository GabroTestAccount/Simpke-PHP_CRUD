<?php
include_once('connect.php');
include('layout/header.php');
?>
<br>
<div class="container text-light text-center bg-dark">
    <div class="row">
        <div class="col">
            <h1>Index page</h1>
        </div>
    </div>
</div>
<br>
<table class="table">
    <thead class="table-dark">
        <row class="d-flex justify-content-between">
            <div class="col-1">
                <h3>Students</h3>
            </div>
            <div class="col-2">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addStudent">
                    Add Student
                </button>
            </div>
            </div>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Age</th>
            </tr>
    </thead>
    <tbody>
        <?php
        $query = 'SELECT * FROM students';
        //return Mysql Result Object
        $result = mysqli_query($conn, $query);
        ?>
        <?php
        if (mysqli_num_rows($result) > 0) {
            //fetch data to use them
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <th scope="col"><?php echo $row['id']; ?></th>
                    <th scope="col"><?php echo $row['first_name']; ?></th>
                    <th scope="col"><?php echo $row['last_name']; ?></th>
                    <th scope="col"><?php echo $row['age']; ?></th>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>

<!-- Modal -->
<form action="add-students.php" method="POST">
    <div class="modal fade" id="addStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body form-control">
                    <div class="row ">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" id="first_name" class="form-control" name="first_name" value="" placeholder="Write your first name">
                    </div>
                    <div class="row ">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" id="last_name" class="form-control" name="last_name" value="" placeholder="Write your last name">
                    </div>
                    <div class="row ">
                        <label for="age" class="form-label">Age</label>
                        <input type="text" id="age" class="form-control" name="age" value="" placeholder="Write your age">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="add-Student" class="btn btn-success" value="Save changes"></button>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_GET['failed_msg']))
        echo '<h6>'.$_GET['failed_msg'].'</h6>';

    if(isset($_GET['success_msg']))
        echo '<h6>'.$_GET['success_msg'].'</h6>';
    ?>
</form>

<?php include_once('layout/footer.php'); ?>