<?php
include_once('connect.php');
include_once('layout/header.php');
?>

<h1>Index page</h1>
<table class="table">
    <thead class="table-light">
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
        <tr>
            <th scope="col">1</th>
            <th scope="col">gabriel</th>
            <th scope="col">nohme</th>
            <th scope="col">23</th>
        </tr>
    </tbody>
</table>

<?php include_once('layout/header.php') ;?>