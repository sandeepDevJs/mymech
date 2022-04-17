<?php

session_start();
if(!isset($_SESSION['garage_id']))
{
  header("Location: http://localhost/mymech/index.php");
}
include('DBconfig.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h3 class="m-0 font-weight-bold text-primary">History
    </h3>
  </div>

  <div class="card-body">

    <div class="table-responsive">

    <?php

$garage_id = $_SESSION['garage_id'];
$query = "SELECT * FROM garage_history WHERE garage_id = $garage_id";
$result = $conn->query($query);

?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
  <tr>
      <th>Name</th>
      <th>Phone</th>
      <th>Car Name</th>
      <th>Car_model</th>
      <th>Date</th>
      <th>Quote</th>
      <th>total</th>
      
  </tr>
</thead>
<tbody>
    <?php
    if(mysqli_num_rows($result) > 0)        
    {
        while($row = mysqli_fetch_assoc($result))
        {
          ?>
      <tr>
        <td><?php  echo $row['user_name']; ?></td>
        <td><?php  echo $row['user_phone']; ?></td>
        <td><?php  echo $row['car_name']; ?></td>
        <td><?php  echo $row['car_model']; ?></td>
        <td><?php  echo $row['date']; ?></td>
        <td>
        <?php
            
                $quote = unserialize($row['quote']);
                $total = $row['total'];
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
      </tr>
      <?php
        } 
    }
    else {
        echo "No Record Found";
    }
    ?>
        
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>