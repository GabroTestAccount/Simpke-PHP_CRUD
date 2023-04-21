<?php

session_start();
$_SESSION['current_page'] = "Get Last Records";
include('connect.php');
include('layout/header.php');




?>
<table class="table">
    <thead class="table-dark">
        <row class="d-flex justify-content-between">
            <div class="col-1">
                <h3>Students</h3>
            </div>
            </div>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Age</th>
            </tr>
    </thead>
    <tbody>
        <?php
        /* * $query2 = "SELECT * FROM students 
                    WHERE id =(select max(id) from students)";
        ------------- >>>>> OR

            * $query1 = "INSERT INTO students (first_name,last_name,age) VALUES ('mazen','fares','44')";
                if (!mysqli_query($conn, $query1)) {
                    die("Error : " . mysqli_error($conn));
                }
                $last_id1 = mysqli_insert_id($conn);
        */
        $query2 = "SELECT * FROM students 
                    ORDER BY id DESC
                    LIMIT     1";

        $result = mysqli_query($conn, $query2);
        if (!$result) {
            die("Error : " . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) > 0) {
            //fetch data to use them
            while ($row1 = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <th scope="col"><?php echo $row1['id']; ?></th>
                    <th scope="col"><?php echo $row1['first_name']; ?></th>
                    <th scope="col"><?php echo $row1['last_name']; ?></th>
                    <th scope="col"><?php echo $row1['age']; ?></th>

                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>
<table class="table">
    <thead class="table-dark">
        <row class="d-flex justify-content-between">
            <div class="col-1">
                <h3>Tachers</h3>
            </div>
            </div>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
            </tr>
    </thead>
    <tbody>
        <?php
        $query3 = "SELECT * FROM teachers 
                    ORDER BY id DESC
                    LIMIT     1";
        $result = mysqli_query($conn, $query3);
        if (!$result) {
            die("Error : " . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) > 0) {
            //fetch data to use them
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <th scope="col"><?php echo $row['id']; ?></th>
                    <th scope="col"><?php echo $row['name']; ?></th>

                </tr>
                <!-- modal Delete-Student -->
                <form action="CRUD/delete_student.php?id=<?php echo $row['id']; ?>" method="POST">
                    <div class="modal fade" id="delete_Student<?php echo $row['id']; ?>" role="dialog" tabstudents="-1">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Do you want to delete the student<u>
                                            <?php echo $row['first_name'] . " " . $row['last_name']; ?></u>?</p>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" name="delete_Student" class="btn btn-danger" value="Delete">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
        <?php
            }
        }
        ?>
    </tbody>
</table>



<?php include('layout/footer.php'); ?>