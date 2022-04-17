<?php

session_start();
if(!isset($_SESSION['garage_id']))
{
  header("Location: http://localhost/services");
}

include('includes/header.php'); 
include('includes/navbar.php');
include('DBconfig.php');

$user_name = '';
$user_phone = '';

$location = 'CST';
$query = "SELECT * FROM requests WHERE location = '$location'";
$result = $conn->query($query);

?>


<!DOCTYPE html>
<html lang="en">
<body>

 
<br>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h3 class="m-0 font-weight-bold text-primary">Requests
    </h3>
  </div>

  <div class="card-body">

    <div class="table-responsive">

    <?php
?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
  <tr>
      <td>Name</td>
      <td>Phone no</td>
      <td>Car Name</td>
      <td>Car Model</td>
      <td>Location</td>
      <td>Quote</td>
      <td>Total</td>
      <td>Action</td>
      
  </tr>
</thead>
<tbody>
    
        
        </tbody>
      </table>

    </div>
  </div>
</div>
<br>
<br>
</div>

<script>

    function accept_req(req_id)
    {

        $.get(

          'accept_req.php',
          {id: req_id},
          function(data){
            alert(data);
          }

        );

    }

    function get_req()
    {
      $("tbody").load("req_code.php");
    }

    setInterval(get_req, 500);

</script>

 
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

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
    
</body>

</html>