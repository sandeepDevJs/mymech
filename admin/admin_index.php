<?php
include 'includes/header.php';
include 'includes/navbar.php';

?>
<head>

  <script type = "text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>

</head>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

  </div>

  <!-- Content Row -->
  <div class="row">
  <?php include "DBconfig.php";?>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Users</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php

$query     = "SELECT * FROM user_signup";
$query_run = $conn->query($query);

$row = mysqli_num_rows($query_run);

echo '<h4> Total Users: ' . $row . '</h4>';
?>


              </div>
            </div>
            <div class="col-auto">
              <i class="far fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Registered Garages</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php

$query     = "SELECT * FROM garage_signup";
$query_run = $conn->query($query);
$row       = mysqli_num_rows($query_run);

echo '<h4> Total Garages: ' . $row . '</h4>';
?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-car fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>



  <!-- Content Row -->






<div class="container-fluid">

  <?php
include 'includes/scripts.php';
include 'includes/footer.php';
?>
</div>