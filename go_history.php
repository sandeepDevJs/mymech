<?php

    session_start();
    include("DBconfig.php");
    $curr_req_id = $_SESSION['user_req_id'];

    $q = "SELECT * FROM requests WHERE req_id = $curr_req_id";
    $re = $conn->query($q);
    $isaccepted = 0;
    foreach($re as $r)
    {
        $isaccepted = (int)$r['is_accepted'];
    }
    $user_id = $_SESSION['user_id']; 

    if($isaccepted == 1)
    {
        unset($_SESSION['status']);
        unset($_SESSION['cart']);
        unset($_SESSION['TotalPrice']);
        $qts = "SELECT * FROM requests WHERE req_id = ".$curr_req_id;
        $results = $conn->query($qts);

        foreach($results as $data)
        {
            $garage_name = $data['garage_name'];
            $quote = $data['qoute'];
            $total = $data['total'];
            $date = date("Y/m/d");
            $qry  = "INSERT INTO `user_history`(`user_id`, `garage_name`, `date`, `qoute`, `total`) 
                VALUES (
                    '$user_id',
                    '$garage_name',
                    '$date',
                    '$quote',
                    '$total'
                )";
            $conn->query($qry);
        }

        $que = "DELETE FROM `requests` WHERE req_id = ".$curr_req_id;
        $conn->query($que);
        echo "<script>window.location.href='history.php'</script>";
    }

?>