<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('DBconfig.php');

function get_totalEarning($gid)
{
  include('DBconfig.php');
  $garage_id = $gid;
  $query = "SELECT total FROM garage_history WHERE garage_id = $garage_id"; 
  $query_run = $conn->query($query);
  $grand = 0;
  foreach($query_run as $am)
  {
    $grand += $am['total'];
  }
  return $grand;
}

function get_accepted_qoute($gid)
{
  include('DBconfig.php');
  $garage_id = $gid;
  $query = "SELECT total FROM garage_history WHERE garage_id = $garage_id"; 
  $query_run = $conn->query($query);
  $row = mysqli_num_rows($query_run);
  return $row;
}

?>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h3 class="m-0 font-weight-bold text-primary">Garages Data
    </h3>
  </div>

  <div class="card-body">

    <div class="table-responsive">

    <?php

$query = "SELECT * FROM garage_signup";
$query_run = mysqli_query($conn, $query);

?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
  <tr>
      <th> Garage name </th>
      <th>Email </th>
      <th>Phone no</th>
      <th>Address</th>
      <th>Location</th>
      <th>Earned Till Now</th>
      <th>Qoute Accepted</th>
  </tr>
</thead>
<tbody>
    <?php
    if(mysqli_num_rows($query_run) > 0)        
    {
        while($row = mysqli_fetch_assoc($query_run))
        {
          ?>
      <tr>
        <td><?php  echo $row['garage_name']; ?></td>
        <td><?php  echo $row['garage_email']; ?></td>
        <td><?php  echo $row['garage_phoneno']; ?></td>
        <td><?php  echo $row['garage_add']; ?></td>
        <td><?php  echo $row['location']; ?></td>
        <td><?php echo "&#8377;".get_totalEarning($row['garage_id']); ?></td>
        <td> <?php echo get_accepted_qoute($row['garage_id']); ?></td>
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