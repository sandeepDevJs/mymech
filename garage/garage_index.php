<?php

session_start();
if(!isset($_SESSION['garage_id']))
{
  header("Location: http://localhost/mymech/index.php");
}
include('includes/header.php'); 
include('includes/navbar.php');

?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    
  </div>
<center>
  <!-- Content Row -->
  <div class="row">
  <?php include("DBconfig.php"); ?>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">New Requests</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
             
              <?php
                 
                 $location = $_SESSION['location'];
                 $query = "SELECT * FROM requests WHERE location = '$location'"; 
                 $query_run = mysqli_query($conn, $query);

                 $row = mysqli_num_rows($query_run);

                 echo '<h4> Total New Request: '.$row.'</h4>';
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


  <!-- Content Row -->
</center>
<center>
  <!-- Content Row -->
  <div class="row">
  <?php include("DBconfig.php"); ?>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">New Requests</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
             
              <?php
                 
                 $garage_id = $_SESSION['garage_id'];
                 $query = "SELECT total FROM garage_history WHERE garage_id = $garage_id"; 
                 $query_run = $conn->query($query);
                 $grand = 0;
                 foreach($query_run as $am)
                 {
                   $grand += $am['total'];
                 }

                 echo '<h4>Earned Till Now:  &#8377;'.$grand.'</h4>';
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


  <!-- Content Row -->
</center>

<center>
  <!-- Content Row -->
  <div class="row">
  <?php include("DBconfig.php"); ?>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">New Requests</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
             
              <?php
                 
                 $garage_id = $_SESSION['garage_id'];
                 $query = "SELECT total FROM garage_history WHERE garage_id = $garage_id"; 
                 $query_run = $conn->query($query);
                 $row = mysqli_num_rows($query_run);
                 echo '<h4>Acceptd Qoute Till Now: '.$row.'</h4>';
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


  <!-- Content Row -->
</center>
  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>