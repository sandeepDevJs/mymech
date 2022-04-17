
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
  .open .dropdown-toggle {
    color: #fff;
    background-color: #555 !important;
  }
  .dropdown-menu li a {
    color: #000 !important;
  }
  .dropdown-menu li a:hover {
    background-color: red !important;
  }
  .logocolor{
    color: #FF0000;
  }
 .bg-img{
    background-image:linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.5)), url(img/car.jpg);
    width:100%;
    height: 700px; 
 }

.header_text{
            font-family: Lato;
            position: relative;
            top:35%;
            left: 10%;
            width:65%;
            text-align: left;

        }
.h_title{
    font-size: 55px;
    font-weight:bold;
    color: #FEF148;
    display: block;

} 
.s_title{
    font-size: 20px;
    font-weight: bold;
    line-height: 32px;
    color: white;
    display: block;
}
.h_get_started{
    color:white;
    background-color: red;
    text-transform: uppercase;
    display: inline-block;
    border-radius: 70px;
    margin-top: 20px;
    padding: 10px 40px 10px 40px;
    cursor: pointer;
    font-size: 18px;
    transition: 0.5s; 
}
.h_get_started:hover{
 padding-left: 30px;
}

.ourservice{
    text-align: center;
    font-size: 55px;
    font-weight: bold;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 300px;
  height: 250px;
  padding-top: 3px;
  padding-left: 7px;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

footer{
        margin: 0;
        padding: 60px;
        height: 450px;
        background-color: #394a6d;
    }
footer .row{
    height: 90%;
    width: 100%;
    margin-left:90px;
}
footer .col-lg-6{
    color: white;
    
}
footer h3{
        margin-top: 0px;
        margin-bottom: 40px;
    }
    
footer .col-lg-6 p{
        margin-top: 30px;
    }
    
.foot{
        margin-top: -245px;
        margin-left: 500px;
        font-weight: bold;
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
         <li><a href="#tour">ABOUT</a></li>
         <li><a data-toggle="modal" data-target="#contact">CONTACT</a></li>
         <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">SIGNUP
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a data-toggle="modal" data-target="#user_signup_Modal">User</a></li>
            <li><a data-toggle="modal" data-target="#garage_signup_Modal">Garage</a></li>
          </ul>
         </li>

         <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">LOGIN
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a data-toggle="modal" data-target="#user_signin_Modal">User</a></li>
            <li><a data-toggle="modal" data-target="#garage_signin_Modal">Garage</a></li>
            <li><a data-toggle="modal" data-target="#admin_signin_Modal">Admin</a></li>  
          </ul>
         </li>
        </ul>
        </div>
  </div>
</nav>

<div class="jumbotron bg-img">

    <div class="header_text">
                        <div class="h_title">
                           India's No.1 Car Service
                        </div>
                        <div class="s_title">
                           32000+ Cars Serviced &amp; Repaired
                        </div>
                        <div data-get-started-button="true" class="h_get_started" data-toggle="modal" data-target="#user_signin_Modal">
                           Get Started
                        </div>
                     </div>
        
</div>

<section>
    <div class="container">
        <h2 class="ourservice">Our Services</h2><hr style="border: 2px solid red">
    </div>
</section>

<section>
    <div class="container">
        <div class="row" style="padding-top: 10px">
            <div class="col-md-4">
                <div class="card">
                        <img src="img/dent.png" alt="Avatar" style="width:288px;"><br>
                                     <div><br> 
                                            <h4 style="margin-left:30%; margin-top: auto;">Dent Repair</h4> 
                                    </div>
                    </div>
            </div>


            <div class="col-md-4">
                <div class="card">
                        <img src="img/interior_cleaning.jpg" alt="Avatar" style="width:288px;"><br>
                                     <div><br> 
                                            <h4 style="margin-left:30%; margin-top: auto;">Interior Cleaning</h4> 
                                    </div>
                    </div>
            </div>


            <div class="col-md-4">
                <div class="card">
                        <img src="img/inspection.jpg" alt="Avatar" style="width:288px;"><br>
                                     <div><br> 
                                            <h4 style="margin-left:30%; margin-top: auto;">Inspection</h4> 
                                    </div>
                    </div>
            </div>
            
        </div>




        <div class="row" style="padding-top: 30px">
            <div class="col-md-4">
                <div class="card">
                        <img src="img/car_polishing.jpg" alt="Avatar" style="width:288px;"><br>
                                     <div><br> 
                                            <h4 style="margin-left:30%; margin-top: auto;">Car Care</h4> 
                                    </div>
                    </div>
            </div>


            <div class="col-md-4">
                <div class="card">
                        <img src="img/car_servicing.jpg" alt="Avatar" style="width:288px;"><br>
                                     <div><br> 
                                            <h4 style="margin-left:30%; margin-top: auto;">Servicing</h4> 
                                    </div>
                    </div>
            </div>


            <div class="col-md-4">
                <div class="card">
                        <img src="img/tyre.jpg" alt="Avatar" style="width:288px;"><br>
                                     <div><br> 
                                            <h4 style="margin-left:30%; margin-top: auto;">Tyre Servicing</h4> 
                                    </div>
                    </div>
            </div>
            
        </div>


        
    </div>
</section>

<section style="background-color:#e5e2e2">
    <div class="container">
        <h3 class="ourservice">Our Partners</h3>
        
    </div>
</section>
<section style="background-color: #e5e2e2 ">
<div class="container">
    <div class="row">
    <div class="col-sm-3">
        <img src="img/ola_logo.png">
    </div>

    <div class="col-sm-3">
        <img src="img/voler_logo.png">
    </div>

    <div class="col-sm-3">
        <img src="img/zoomcar_logo.png">
    </div>


    <div class="col-sm-3">
        <img src="img/uber_logo.png">
    </div>

</div>
</div>
</section>

<footer>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6" >
                    <h3>Our Services</h3>
                    <h4>Dent</h4>
                    <h4>Battery Service</h4>
                     <h4>Car Inspection</h4>
                     <h4>painting</h4>
                     <h4>Car Services</h4>
                </div>

                <div class="col-lg-6 foot">
                             <p onclick="window.location.href='index.php' "><h4>Home</h4></p>
                             <p onclick="window.location.href='index.php' "><h4>login</h4></p>
                             <p onclick="window.location.href='index.php' "><h4>signup</h4></p>
                             <p onclick="window.location.href='Contact.php' "><h4>Contact Us</h4></p>
                             <p onclick="window.location.href='about.php' "><h4>About us</h4></p>
                </div>
            </div>
        </div>

        <div>
            <p style="color: white;">@2019 MyMechanic</p>        
        </div>

    </section>
</footer>
<?php include 'user_signup.php'?>
<?php include 'user_signin.php'?>
<?php include 'garage/garage_signup.php'?>
<?php include 'garage/garage_signin.php'?>
<?php include 'admin/admin_signin.php'?>
<?php include 'Contact.php'?>

</body>

</html>

    
    
    
    