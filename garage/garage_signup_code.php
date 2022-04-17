<?php
include "DBconfig.php";

if (count($_POST) > 0) {

    $gname    = htmlentities(mysqli_real_escape_string($conn, $_POST['garage_name']));
    $gemail   = htmlentities(mysqli_real_escape_string($conn, $_POST['garage_email']));
    $gphoneno = htmlentities(mysqli_real_escape_string($conn, $_POST['garage_phoneno']));
    $gpass    = htmlentities(mysqli_real_escape_string($conn, $_POST['garage_pass']));
    $gadd     = htmlentities(mysqli_real_escape_string($conn, $_POST['garage_add']));
    foreach ($_POST['locations'] as $loc) {
        $location = htmlentities(mysqli_real_escape_string($conn, $loc));
    }
    if ($gname == '') {

        echo "err,Name cannot be empty";

        exit();
    }
    if ($gemail == '') {

        echo "err,Email cannot be empty";
        exit();
    }
    if ($gphoneno == '') {

        echo "err,phone cannot be empty";

        exit();
    }
    if ($gpass == '') {

        echo "err,Password cannot be empty";

        exit();
    }
    if ($gadd == '') {

        echo "err,address cannot be empty";

        exit();
    }
    if (strlen($gpass) < 8) {
        echo "err,password should be minimum 8 characters";
        exit();
    }

    $check_email = "select * from garage_signup where garage_email='$gemail' or garage_phoneno='$gphoneno'";
    $run_email   = mysqli_query($conn, $check_email);

    $check = mysqli_num_rows($run_email);

    if ($check == 1) {

        echo "err,Email or Phone already exist";

        exit();
    }

    $insert = "insert into garage_signup (garage_name, garage_email, garage_phoneno, garage_pass, garage_add, location) values('$gname', '$gemail', '$gphoneno', '$gpass','$gadd', '$location')";

    $query = mysqli_query($conn, $insert);

    if ($query) {
        echo "success,Registered Successfully!";
    } else {
        echo "err,Registration failed, try again";
    }
}
