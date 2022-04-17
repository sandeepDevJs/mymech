<?php

include "DBconfig.php";

if (isset($_POST['admin_sign_in'])) {

    $email = htmlentities(mysqli_real_escape_string($conn, $_POST['email']));
    $pass  = htmlentities(mysqli_real_escape_string($conn, $_POST['pass']));

    $select_user = "select * from admin_login where admin_email='$email' AND admin_pass='$pass' LIMIT 1";

    $query      = mysqli_query($conn, $select_user);
    $check_user = mysqli_num_rows($query);

    if ($check_user == 1) {
        $_SESSION['admin_email'] = $email;

        $update_msg = mysqli_query($conn, "UPDATE admin_login SET log_in='Online' WHERE admin_email='$email' ");

        $user     = $_SESSION['admin_email'];
        $get_user = "Select * from admin_login where admin_email = '$user' ";
        $run_user = mysqli_query($conn, $get_user);
        $row      = mysqli_fetch_array($run_user);

        $user_name              = $row['admin_name'];
        $_SESSION['id']         = $row['id'];
        $_SESSION['admin_name'] = $user_name;

        $_SESSION["is_admin_login"] = true;

        header("Location: admin_index.php");

    } else {
        echo "<script>alert('Invalid email and password')</script>";
    }
}
