<?php

session_start();

include "DBconfig.php";
$query  = "DELETE FROM requests WHERE req_id=" . $_SESSION['user_req_id'];
$result = $conn->query($query);

unset($_SESSION['status']);
unset($_SESSION['cart']);
unset($_SESSION['user_req_id']);
