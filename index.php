<?php
include_once('connect.php');
include_once('layout/header.php');
?>
<div class="container text-light text-center bg-dark">
    <div class="row">
        <div class="col">
            <h1>Index page</h1>
        </div>
    </div>
</div>

<table class="table">
    <thead class="table-dark">
        <div class="d-flex justify-content-center">
            <h3>Students</h3>
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

<?php include_once('layout/header.php'); ?>