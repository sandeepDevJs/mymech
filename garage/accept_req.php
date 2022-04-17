<?php

    session_start();
    if(!isset($_SESSION['garage_id']))
    {
    header("Location: garage_signin.php");
    }
    
    $req_id  = $_GET['id'];
    include('DBconfig.php');
    $query = "SELECT * FROM requests WHERE req_id = $req_id";
    $result = $conn->query($query);

    foreach($result as $req_data)
            {
                $car_name = $req_data['car_name'];
                $model = $req_data['model'];
                $user_location = $req_data['location'];
                $quote = $req_data['qoute'];
                $total = $req_data['total'];
                $user_id = $req_data['user_id'];

            }

            $query1 = "SELECT * FROM user_signup WHERE user_id=".$user_id;
            include('DBconfig.php');
            $result1 = $conn->query($query1);
            foreach($result1 as $user_data)
            {
              $user_name = $user_data['user_name'];
              $user_phone = $user_data['user_phoneno'];
            }

            $garage_name = $_SESSION['garage_name'];
            $query = "UPDATE requests SET is_accepted = 1, garage_name = '$garage_name' WHERE req_id = $req_id";
            $conn->query($query);

            $date = date("Y/m/d");
            $garage_id = $_SESSION['garage_id'];

            $query = "INSERT INTO `garage_history`(`user_name`, `garage_id`, `user_phone`, `quote`, `total`, `car_name`, `car_model`, `date`) 
            VALUES (
                '$user_name',
                 $garage_id,
                '$user_phone',
                '$quote',
                '$total',
                '$car_name',
                '$model',
                '$date'
            )";

            $conn->query($query);
            
            echo "Request accepted! You can see it in history!";



?>