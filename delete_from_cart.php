<?php

    session_start();

    //getting service id.
    $id = $_GET['id'];

    //function removes data from cart.
    function remove_element($array,$value) {
        return array_diff($array, (is_array($value) ? $value : array($value)));
    }

    //storing cart in new var.
    $services_id = $_SESSION['cart'];

    //storing new changed array in new var.
    $after_remove = remove_element($services_id, $id);

    //reassigning new updated array to session.
    $_SESSION['cart'] = array_values($after_remove);
    echo "Removed From Cart!!";
?>