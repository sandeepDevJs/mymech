<?php

session_start();

include "DBconfig.php";
$query    = "SELECT * FROM location WHERE loc_id = " . $_COOKIE['loc_id'];
$result   = $conn->query($query);
$location = '';
foreach ($result as $loc) {
    $location = $loc['location'];
}

$query    = "SELECT * FROM cars WHERE car_id = " . $_COOKIE['car_id'];
$result   = $conn->query($query);
$car_name = '';
foreach ($result as $loc) {
    $car_name = $loc['car_name'];
}

$car_model = $_COOKIE['car_model'];

$user_id = $_SESSION['user_id'];

$quote = serialize($_SESSION['cart']);

$total = $_SESSION['TotalPrice'];

$query1 = "INSERT INTO `requests`(`user_id`, `qoute`, `total`, `car_name`, `model`, `location`)
    VALUES (
        $user_id,
        '$quote',
        '$total',
        '$car_name',
        '$car_model',
        '$location'
    )";

$conn->query($query1);
$_SESSION['status'] = 'Pending';

$_SESSION['user_req_id'] = mysqli_insert_id($conn);

$garage_query  = "SELECT `garage_phoneno`, `garage_name` FROM `garage_signup` WHERE location='" . $location . "'";
$garage_result = $conn->query($garage_query);

$curl = curl_init();

$endpoint = 'http://msg.mtalkz.com/V2/http-api.php';

//notify each vendor over sms
foreach ($garage_result as $gdata) {
    $gnumber = $gdata["garage_phoneno"];
    $gname   = $gdata["garage_name"];
    echo $gnumber;
    echo $gname;

    $message = "NEW LEAD NOTIFICATION You have a new lead Name: " . $gname . " Check your vendor app and call them. -FEBA -FEBA";
    $params  = array('apikey' => '', 'senderid' => 'FEBABM', 'number' => $gnumber, 'message' => $message, 'format' => 'json');
    $url     = $endpoint . '?' . http_build_query($params);

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    print_r($output);
}

curl_close($curl);

header("Location: status.php");
