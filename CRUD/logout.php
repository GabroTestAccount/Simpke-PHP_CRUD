<?php

session_start();
session_unset();
session_destroy();

header("location:../login.php?success_msg=you logged out successfully");

