<?php
  session_start();
    unset($_SESSION['id']);
    unset($_SESSION['admin_name']);
    unset($_SESSION['login']);
    header("Location: http://localhost/mymech/index.php");

?>