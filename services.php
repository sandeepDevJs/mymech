<?php

session_start();
//if any request is pending
if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] == 'Pending') {
        header("Location: status.php");
    }
} elseif (!isset($_SESSION['login'])) {
    header("Location: index.php");
} elseif (!isset($_COOKIE['loc_id'])) {
    header("Location: select_location.php");
}
//including db config
include "DBconfig.php";
$query = "SELECT * FROM car_service";

//retreve all services.
$result = $conn->query($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">

<style>

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  padding-top: 5px;
  padding-left: 9px;
  padding-right: 9px;
  padding-bottom: 9px;
  background-color:#fff;

}
.cart-container {
    border-radius: 4px;
}
#main-container1{
    min-height: 260px;
    margin: auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
}


</style>


</head>
 <body>

 <?php include 'partials/select_service_header.php'?>
    <br><br>
    <section>
        <div class="container">
          <div class="row">

          <div class="col-sm-8">
            <div class="row">

            <?php

//printing each services.
foreach ($result as $data) {
    echo '<div class="card">
                  <div class="service-item row sir-parent" id="available-item-1">

                      <div class="sir-cont">
                        <div class="item-description col-md-6 text-left">
                            <h4><b>' . $data["service"] . '</b></h4>
                            <p class="sr-items-subtext">
                              ' . $data["description"] . '
                            </p>

                        </div>

                        <div class="item-book col-md-6 text-right">


                          <p style="font-size:11px;">
                            <span style="font-size:26px;color:#000;">
                              <i class="fa fa-inr"></i>
                              ' . $data["price"] . '
                            </span><br>
                            <span style="font-size:12px;">
                              Tax Included
                            </span>
                          </p>

                          <button class="btn btn-block btn-primary  btn-success" id="addToCartButton_8" onclick=add_to_cart(' . $data["id"] . ')  style="width:80px;float:right;margin-right:4px;"> <i class="fa fa-cart-plus"></i> Add</button>

                        </div>
                      </div>
                  </div>
              </div>
              <br>';
}

?>
                  </div>
              </div>


                  <div class="col-sm-4 cart-container" style="box-shadow: rgb(239, 239, 239) 0px 0px 8px 3px; position: fixed; right: 25px; width: 405px; height:230px; z-index: 9999999;" id="main-container1">

                      <center>
                        <h3 style="margin:0 auto;margin-bottom:5px;">Your Quote</h3>
                      </center>
                      <hr style="margin-top: 5px;margin-bottom: 5px;">
                      <!-- below div tag is will have all cart details. -->
                      <div id="services"></div>

                      <hr style="margin-top: 5px;margin-bottom: 5px;">


                      <div>
                        <button class="btn btn-success allServiceDetailsCheck" onclick="go_to_status()">Book Now <i class="fa fa-paper-plane"></i></button>
                      </div>


              </div>

          </div>
        </div>
    </section>
    <script>
        //function to add item to cart.
        function add_to_cart(car_id){
          //jquery ajax to get data from php file
          $.get("add_to_cart.php",

            //passing service id to php file
            {id : car_id},

            //alert results.
            function(data){
              // alert(data);
            }
          );
        }

        //following function will load cart from sessions to div which has id services.
        function load_quote(){

          $("#services").load('load_quote.php');

        }

        //loading session cart to qoute after every 1sec.
        setInterval(load_quote, 1000);

        //deletes item from cart.
        function delete_from_cart(car_id)
        {
          $.get("delete_from_cart.php",

            {id : car_id},

            function(data){
              // alert(data);
            }
          );
        }

        //function to book
        function go_to_status()
        {
          window.location.href="payment.php";
        }
    </script>

    <?php include 'partials/footer.php'?>

 </body>
 </html>