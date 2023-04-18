<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <?php  if(isset($_SESSION['username'])) {?>
        <a href="#">
            <img src="css/images/coco.jpg" class="rounded-circle x-cm-thum" width="40px" height="40px" alt="profile image">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Pages
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="students.php">Students</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </li>

                <span class="navbar-text">
                    <?php if (isset($_SESSION['current_page']))
                        echo '| '.$_SESSION['current_page']; ?>
                </span>
            </ul>
            <?php }?>
            <ul>
                <?php
                if (!isset($_SESSION['username'])) {
                    if (isset($_SESSION['current_page']) && $_SESSION['current_page'] == "signup") {
                ?>
                        <div class="btn-group ">
                            <a href="login.php" name="login" class="btn btn-success">Login</a>

                        </div>

                    <?php } ?>
                    <?php
                    if (isset($_SESSION['current_page']) && $_SESSION['current_page'] == "login") {
                    ?>
                        <div class="btn-group ">
                            <a href="signup.php" name="signup" class="btn btn-success">Sign up</a>
                        </div>
                <?php
                    }
                } ?>
            </ul>
            <ul>
                <?php
                if (isset($_SESSION['username'])){
                    
                ?>
                <div class="btn-group ">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['username'];?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item "  href="CRUD/logout.php" >Logout</a></li>
                        <li><a class="dropdown-item" href="#">Menu item</a></li>
                        <li><a class="dropdown-item" href="#">Menu item</a></li>
                        <?php } ?>
                    </ul>
                </div>
        </div>
    </div>

</nav>
<br>