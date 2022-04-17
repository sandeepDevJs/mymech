<?php

    session_start();
    unset($_SESSION['user_id']);
    unset($_SESSION['user_name']);
    unset($_SESSION['login']);
    session_destroy($_SESSION['user_id']);

    unset($_SESSION['status']);
    unset($_SESSION['cart']);

    header("Location: index.php");

?>