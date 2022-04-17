<?php

session_start();
if(!isset($_SESSION['login'])){
  header("Location: index.php");
}
include('DBconfig.php');

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM user_history,user_signup  WHERE user_signup.user_id = user_history.user_id AND user_history.user_id = $user_id";
$result = $conn->query($query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
 

<style>
.container{
    padding: 40px 120px;
}    
 
   .nav-tabs li a {
    color: #777;
  }
 
  .navbar {
    font-family: Montserrat, sans-serif;
    margin-bottom: 0;
    background-color: #2d2d30;
    border: 0;
    font-size: 15px !important;
    letter-spacing: 4px;
    opacity: 1.0;
    font-weight: bold;
  }
  .navbar li a, .navbar .navbar-brand { 
    color: #d5d5d5 !important; 
  }
  .navbar-nav li a:hover {
    color: #fff !important;
  }
  .navbar-nav li.active a {
    color: #fff !important;
    background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
    border-color: transparent;
  }
  .logocolor{
    color: #FF0000;
  }
  </style>


</head>
<body>

 <?php include 'partials/select_service_header.php'?>
    
<br>
<br>
<br>
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
?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
  <tr>
      <td>Garage Name</td>
      <td>Date</td>
      <td>Qoute</td>
      <td>Total</td>
      
  </tr>
</thead>
<tbody>
    <?php
    if(mysqli_num_rows($result) > 0)        
    {
          foreach($result as $req_data)
            {
                $garage_name = $req_data['garage_name'];
                $date = $req_data['date'];
                $total = $req_data['total'];
                $user_id = $req_data['user_id'];
          ?>
      <tr>
        
        <td><?php  echo $garage_name; ?></td>
        <td><?php  echo $date; ?></td>
        <td>
        
        <?php
            
            $quote = unserialize($req_data['qoute']);
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
        <td><?php  echo "&#8377;".$total; ?></td>
      </tr>
      <?php
        } 
    }
    else {
        echo "<h4>No Record Found</h4>";
    }
    ?>
        
        </tbody>
      </table>

    </div>
  </div>
</div>
<br>
<br>
</div>


<!-- Modal -->
<div class="modal fade" id="view_Modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:25px 30px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="signin_header"><span class="glyphicon glyphicon-lock"></span> Name</h4>
        </div>
        <div class="modal-body" style="padding:30px 40px;">
       <h2> main content</h2>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
         

        </div>
      </div>
      
    </div>
  </div> 
</div>
 
<script>
$(document).ready(function(){
  $("#myBtn").click(function(){
    $("#view_Modal").modal();
  });
});
</script>


      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; MyMechanic 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
      </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->

    
</body>

</html>