<?php
  include('includes/header.php'); 
  include('includes/navbar.php'); 
?>

<?php
  include('DBconfig.php');
    if(isset($_POST['subloc'])){
      $addloc = htmlentities(mysqli_real_escape_string($conn, $_POST['addloc']));
        
      
      if ($addloc == '') {
        echo "<script>alert('Please enter any Location')</script>";
        echo "<script>window.open('index.php','_self')</script>";
        exit();
      }
      
      $insert = "insert into location (location) values('$addloc')";

      $query= mysqli_query($conn, $insert);

      if ($query) {
        echo"<script>alert('Location Added')</script>";
        echo"<script> window.open('Locations.php', '_self')</script>";
      }
      else{
        echo"<script>alert('Operation failed, try again')</script>";
        echo"<script> window.open('Locations.php', '_self')</script>";
      }
    }
    
    if(isset($_POST['subservice']))
    {
      $service_name = htmlentities(mysqli_real_escape_string($conn, $_POST['serviceName']));
      $desc = htmlentities(mysqli_real_escape_string($conn, $_POST['desc']));
      $price = htmlentities(mysqli_real_escape_string($conn, $_POST['price']));

      $insert = "INSERT INTO `car_service`( `service`, `description`, `price`) VALUES ('$service_name', '$desc', '$price')";
      $query= mysqli_query($conn, $insert);

      if ($query) {
        echo"<script>alert('Service Added')</script>";
        echo"<script> window.open('Locations.php', '_self')</script>";
      }
    }

    if(isset($_POST['subcar']))
    {
      $car = htmlentities(mysqli_real_escape_string($conn, $_POST['car-name']));
      $model = htmlentities(mysqli_real_escape_string($conn, $_POST['car-model']));

      $insert = "INSERT INTO `cars`(`car_name`, `car_model`) VALUES ('$car', '$model')";
      $query= mysqli_query($conn, $insert);

      echo $conn->error;

      if ($query) {
        echo"<script>alert('Car Details Added')</script>";
        echo"<script> window.open('Locations.php', '_self')</script>";
      }
    }
    ?>



<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h3 class="m-0 font-weight-bold text-primary">Add Locations
    </h3>
  </div>

  <div class="card-body">
   <div class="col-md-9 personal-info">
        
        <form method = "post" class="form-horizontal" role="form">

          
          <div class="form-group">
            <label class="col-lg-3 control-label">Locations :</label>
            <div class="col-lg-8">
              <input class="form-control" type="text"  name="addloc">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <button type="submit" name="subloc" class="btn btn-primary">Add</button>
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>



<!-- Add Service -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h3 class="m-0 font-weight-bold text-primary">Add Service
    </h3>
  </div>

  <div class="card-body">
   <div class="col-md-9 personal-info">
        
        <form method = "post" class="form-horizontal" role="form">

          
          <div class="form-group">
            <label class="col-lg-3 control-label">Service Name :</label>
            <div class="col-lg-8">
              <input class="form-control" type="text"  name="serviceName" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Description :</label>
            <div class="col-lg-8">
              <input class="form-control" type="text"  name="desc" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">price :</label>
            <div class="col-lg-8">
              <input class="form-control" type="number"  name="price" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <button type="submit" name="subservice" class="btn btn-primary">Add</button>
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>


<!-- Add Car details -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h3 class="m-0 font-weight-bold text-primary">Add Car Details
    </h3>
  </div>

  <div class="card-body">
   <div class="col-md-9 personal-info">
        
        <form method = "post" class="form-horizontal" role="form">

          
          <div class="form-group">
            <label class="col-lg-3 control-label">Car Name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text"  name="car-name" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Model</label>
            <div class="col-lg-8">
              <input class="form-control" type="text"  name="car-model" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <button type="submit" name="subcar" class="btn btn-primary">Add</button>
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>





<?php
  include('includes/scripts.php');
  include('includes/footer.php');
?>