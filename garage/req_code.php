<?php

session_start();
include('DBconfig.php');

$user_name = '';
$user_phone = '';

$location = $_SESSION['location'];
$query = "SELECT * FROM requests WHERE location = '$location'";
$result = $conn->query($query);

?>

<?php
    if(mysqli_num_rows($result) > 0)        
    {
          foreach($result as $req_data)
            {
                $car_name = $req_data['car_name'];
                $model = $req_data['model'];
                $user_location = $req_data['location'];
                $quote = unserialize($req_data['qoute']);
                $total = $req_data['total'];
                $user_id = $req_data['user_id'];
                $req_id = $req_data['req_id'];
                
                $query1 = "SELECT * FROM user_signup WHERE user_id=".$user_id;
                include('DBconfig.php');
                $result1 = $conn->query($query1);
                foreach($result1 as $user_data)
                {
                  $user_name = $user_data['user_name'];
                  $user_phone = $user_data['user_phoneno'];
                }
          ?>
      <tr>
        
        <td><?php  echo $user_name; ?></td>
        <td><?php  echo $user_phone; ?></td>
        <td><?php  echo $car_name; ?></td>
        <td><?php  echo $model; ?></td>
        <td><?php  echo $user_location; ?></td>

        <td>
            <?php
            
                $cart = array();
                foreach($quote as $dts)
                {
                    $q = "SELECT service FROM car_service WHERE id = $dts";
                    $re = $conn->query($q);
                    foreach($re as $r)
                    {
                        array_push($cart, $r['service']);
                    }
                }

                foreach($cart as $item)
                {
                    echo $item."<br>";
                }
            
            ?>
        </td>

        <td><?php echo "&#8377;".$total; ?></td>

        <td>
        
        <button type="submit" onclick=accept_req(<?php echo $req_id; ?>) class="btn btn-success">Accept</button>

        </td>
      </tr>
      <?php
        } 
    }
    else {
        echo "No Record Found";
    }
    ?>