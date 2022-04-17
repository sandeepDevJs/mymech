
<?php

session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
}

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
 .bg-img{
    background-image:linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.5)), url(img/car.jpg);
    width:100%;
    height: 700px;
 }

    .header{
        padding-top: 40px;
    }
    .body{
        padding-top:10px;
    }
    .card{
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3;
        width:275px;
        height: 40px;
    }
    .card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

    .card-title{
        margin: 0px;
        padding-top: 10px;
        padding-bottom: 10px;
        background: #fff;
        color: #555;
        text-align: center;
    }

    .mar-bot{
        margin-bottom:15px;
    }
</style>
</head>

<body>
 <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href=""><img src="img/logo.png" style="height: 33px"></a>
            <a class="navbar-brand" href="" style="padding-left:5px">My<span class="logocolor">Mechanic</span></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
         <li><a href="#myPage">HOME</a></li>
         <li><a href="#band">SERVICES</a></li>
         <li><a href="#tour">ABOUT</a></li>
         <li><a href="#contact">CONTACT</a></li>
        </div>
  </div>
     </div></nav>
     <br>
     <br>

    <div class ="container-fluid header">
        <div class="col-sm-12">
        <div class="col-sm-3">
            <h1>Cars</h1>
            </div>
        </div>
    </div>

     <hr>

    <div class="conatiner body">
        <div class="col-sm-12">
            <?php

//if cookie doesn't exist then go and select location first
if (!isset($_COOKIE['loc_id'])) {
    header("Location: select_location.php");
} else {

    //including db configuration file.
    include "DBconfig.php";
    $query  = "SELECT car_id, car_name FROM cars";
    $result = $conn->query($query);

    //prints each box.
    foreach ($result as $cars) {
        echo '<div class="col-sm-3 mar-bot" >
                                <div class="card" onclick="go_to_models(' . $cars["car_id"] . ')">
                                    <h4 class="card-title">' . $cars["car_name"] . '</h4>
                                </div>
                            </div>';
    }
}

?>

        </div>
    </div>

<script>

    //following function creates a cookie of selected car and redirects to next page.
    function go_to_models(id){

        var now = new Date();
        now.setDate( now.getDate() + 1 );
        document.cookie = "car_id="+id+"; expires="+now.toUTCString();
        window.location.href = 'select_model.php';
    }

</script>


</body>

</html>