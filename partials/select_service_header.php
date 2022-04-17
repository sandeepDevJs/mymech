<style>
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
</style>
    <nav class="navbar navbar-inverse">
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
            <ul class="nav navbar-nav ">
             <li><a href="user_home.php">Home</a></li>
             <li><a href="Status.php">Status</a></li>
             <li><a href="history.php">History</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
            </ul>
            </div>
      </div>
    </nav>
</div>