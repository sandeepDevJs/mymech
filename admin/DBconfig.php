<?php


    //creating connection to mysql
    $conn = new mysqli('localhost', 'root', '', 'mymech');
 
    //if error occurs in connecting to db it will show an error
    if($conn->connect_error){
        die('<b>An error occured: </b>'.$conn->connect_error);
    }


?>