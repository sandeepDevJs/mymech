<?php

session_start();

//function checks if service is already exists in cart.
function exists($i)
{
    foreach ($_SESSION['cart'] as $data) {
        if ($data == $i) {
            return true;
        }
    }
    return false;
}

//getting id
$id = $_GET['id'];

//if session doesn't exist then create on.
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array($id);
    echo "Service Added To Cart! ";
} 
//else if session is empty, then add data.
elseif (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array($id);
    echo "Service Added To Cart!";
} else {
    //if service doesn't exist in cart then add one.
    if (exists($_GET['id']) == false) {
        array_push($_SESSION['cart'], $id);
        echo "Service Added To Cart!";
    } 
    //else say it already exists.
    else {
        echo "Service already exists!";
    }
}
