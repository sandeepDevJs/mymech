<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('DBconfig.php');

function get_totalEarning($uid)
{
  include('DBconfig.php');
  $user_id = $uid;
  $query = "SELECT total FROM user_signup WHERE user_id = $user_id"; 
  $query_run = $conn->query($query);
  $grand = 0;
  foreach($query_run as $am)
  {
    $grand += $am['total'];
  }
  return $grand;
}

?>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h3 class="m-0 font-weight-bold text-primary">Users Data
    </h3>
  </div>

  <div class="card-body">

    <div class="table-responsive">

    <?php

$query = "SELECT * FROM user_signup";
$query_run = mysqli_query($conn, $query);

?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
  <tr>
      <th>Name </th>
      <th>Email </th>
      <th>Phone no</th>
      <th>Status</th>
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
        <td><?php  echo $row['user_name']; ?></td>
        <td><?php  echo $row['user_email']; ?></td>
        <td><?php  echo $row['user_phoneno']; ?></td>
        <td><?php  echo $row['log_in']; ?></td>
     
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