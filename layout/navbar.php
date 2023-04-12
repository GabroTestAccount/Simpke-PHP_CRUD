<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <h4 class="navbar-brand" style="color: blue">
            <?php
            if (isset($_SESSION['username']))
                echo $_SESSION['username'];
            ?>
        </h4>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>
            <ul>
                <?php
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

                <?php } ?>
            </ul>
            <ul>
                <div class="btn-group ">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        settings
                    </button>
                    <ul class="dropdown-menu">
                        <?php
                        if (isset($_SESSION['username']))
                            echo '<li><a class="dropdown-item "  href="CRUD/logout.php" >Logout</a></li>';
                        ?>
                        <li><a class="dropdown-item" href="#">Menu item</a></li>
                        <li><a class="dropdown-item" href="#">Menu item</a></li>
                    </ul>
                </div>
        </div>
    </div>
</nav>