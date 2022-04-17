<?php

include "DBconfig.php";

if (count($_POST) > 0) {
    session_start();
    $email = htmlentities(mysqli_real_escape_string($conn, $_POST['email']));
    $pass  = htmlentities(mysqli_real_escape_string($conn, $_POST['pass']));

    $select_user = "select * from garage_signup where garage_email='$email' AND garage_pass='$pass'";

    $query      = mysqli_query($conn, $select_user);
    $check_user = mysqli_num_rows($query);

    if ($check_user == 1) {
        $_SESSION['garage_email'] = $email;

        $update_msg = mysqli_query($conn, "UPDATE garage_signup SET log_in='Online' WHERE garage_email='$email' ");

        $user     = $_SESSION['garage_email'];
        $get_user = "Select * from garage_signup where garage_email = '$user' ";
        $run_user = mysqli_query($conn, $get_user);
        $row      = mysqli_fetch_array($run_user);

        $user_name               = $row['garage_name'];
        $_SESSION['garage_id']   = $row['garage_id'];
        $_SESSION['garage_name'] = $user_name;
        $_SESSION['location']    = $row['location'];

        echo "success,Registered Successfully!";
    } else {
        echo "err,Invalid email and password";
    }
}
