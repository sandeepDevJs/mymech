<?php
include "DBconfig.php";

if (count($_POST) > 0) {

    $name    = htmlentities(mysqli_real_escape_string($conn, $_POST['user_name']));
    $email   = htmlentities(mysqli_real_escape_string($conn, $_POST['user_email']));
    $phoneno = htmlentities(mysqli_real_escape_string($conn, $_POST['user_phoneno']));
    $pass    = htmlentities(mysqli_real_escape_string($conn, $_POST['user_pass']));

    if ($name == '') {

        echo "err,Name cannot be empty";
        exit();
    }
    if ($email == '') {

        echo "err,Email cannot be empty";
        exit();
    }
    if ($phoneno == '') {

        echo "err,phone cannot be empty";
        exit();
    }
    if ($pass == '') {

        echo "err,Password cannot be empty";
        exit();
    }
    if (strlen($pass) < 8) {
        echo "err,password should be minimum 8 characters";
        exit();
    }

    $check_email = "select * from user_signup where user_email='$email' or user_phoneno='$phoneno'";
    $run_email   = mysqli_query($conn, $check_email);

    $check = mysqli_num_rows($run_email);

    if ($check == 1) {
        echo "err,Email or Phone already exist";
        exit();
    }

    $insert = "insert into user_signup (user_name, user_email, user_phoneno, user_pass) values('$name', '$email', '$phoneno', '$pass')";

    $query = mysqli_query($conn, $insert);

    if ($query) {
        echo "success,Registered Successfully!";
    } else {
        echo "err,Registration failed, try again";
    }
}
