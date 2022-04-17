<?php

session_start();
if (!isset($_SESSION['garage_id'])) {
    header("Location: http://localhost/mymech/index.php");
}
include 'DBconfig.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h3 class="m-0 font-weight-bold text-primary">Profile
    </h3>
  </div>

  <div class="card-body">
   <div class="col-md-9 personal-info">
      <?php

$garage_id = $_SESSION['garage_id'];
$query     = "SELECT * FROM garage_signup WHERE garage_id = $garage_id";
$result    = $conn->query($query);

?>
        <form class="form-horizontal" method="post" role="form">

           <?php
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <div class="form-group">
            <label class="col-lg-3 control-label">Garage name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?php echo $row['garage_name']; ?>" name="garage_name">
            </div>
          </div>


          <div class="form-group">
            <label class="col-lg-3 control-label">Garage Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?php echo $row['garage_email']; ?>" name="garage_email">
            </div>
          </div>
            <div class="form-group">
            <label class="col-lg-3 control-label">Phone No:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?php echo $row['garage_phoneno']; ?>" name="garage_phoneno">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" value="<?php echo $row['garage_pass']; ?> "name="garage_pass">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Location:</label>
            <div class="col-lg-8">

                <select id="garage-sign-up-location" value="<?php echo $row['location']; ?> " name="location" class="form-control" required>

                  <?php

        include 'DBconfig.php';

        $qr  = "SELECT location FROM location";
        $res = $conn->query($qr);

        foreach ($res as $r) {
            if ($r['location'] === $row['location']) {
                echo "<option value = '" . $r['location'] . "' selected >" . $r['location'] . "</option>";
            } else {
                echo "<option value = " . $r['location'] . ">" . $r['location'] . "</option>";

            }

        }

        ?>

                </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Garage Address:</label>
            <div class="col-lg-8">
              <input class="form-control" type="textarea" value="<?php echo $row['garage_add']; ?> "name="garage_add">
            </div>
          </div>
           <?php
}
}?>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <button type="submit" name="submit" class="btn btn-primary">Ok</button>
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<?php
include "DBconfig.php";

if (isset($_POST['submit'])) {
    $gname    = $_POST['garage_name'];
    $gemail   = $_POST['garage_email'];
    $gphoneno = $_POST['garage_phoneno'];
    $gpass    = $_POST['garage_pass'];
    $location = $_POST['location'];
    $gadd     = $_POST['garage_add'];
    $query    = "UPDATE `garage_signup` SET `location` = '$location' WHERE `garage_id` = $garage_id";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
    ?>
                     <script type="text/javascript">
            alert("Update Successfull.");
            window.location = "profile.php";
        </script>
        <?php
}
?>









    <?php
include 'includes/scripts.php';
include 'includes/footer.php';
?>