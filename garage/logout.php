<?php

    session_start();
    unset($_SESSION['garage_id']);
    unset($_SESSION['garage_name']);
    unset($_SESSION['login']);
    unset($_SESSION['location']);
    header("Location: http://localhost/mymech/index.php");


?>