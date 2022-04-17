<?php

session_start();
include 'DBconfig.php';
if (!isset($_SESSION['cart'])) {
    echo "<script>alert('cart is empty! Please select any service');</script>";
    echo "<script>window.location.href='user_home.php';</script>";
} else if (empty($_SESSION['cart'])) {
    echo "<script>alert('cart is empty! Please select any service');</script>";
    echo "<script>window.location.href='user_home.php';</script>";
} elseif (!isset($_SESSION['login'])) {
    header("Location: index.php");
} else {

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
      .black-border {
        border: 1px solid black;
        position: relative;
        left: 48rem;
        height: 100%;
      }
    </style>

  </head>

  <body>

    <?php include 'partials/select_service_header.php'?>
    <br><br><br>
    <center>

      <h1>Status: Pending..</h1>
      <h2>Please Stay Here For A While, Connecting to garages..</h2>

    </center>
    <br>
    <br>

    <div class="col-sm-9 cart-container black-border" style="box-shadow: rgb(239, 239, 239) 0px 0px 8px 3px; width: 405px; height:230px;">

      <center>
        <h3 style="margin:0 auto;margin-bottom:5px;">Your Quote</h3>
      </center>
      <div id="services"></div>
      <hr style="margin-top: 5px;margin-bottom: 5px;">

    </div>

    <div id="his" style="height:300px"></div>

    <div class="container" style="position:relative; top:30%; bottom:0;width:100%;">
      <h3 style="margin-left:20%;">You can connect to below unregistered garages near you for quick services.</h3>
      <div id="unregistered-garage-lists"></div>
    </div>


    <script>
      //following function will load cart from sessions to div which has id services.

      let loc_name = getCookie("loc_name");

      function load_quote() {
        $("#services").load('load_for_status.php');
      }

      //loading session cart to qoute after every 1sec.
      setInterval(load_quote, 1000);

      function go_history() {
        $("#his").load('go_history.php');
      }

      setInterval(go_history, 1000);

      function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for (let i = 0; i < ca.length; i++) {
          let c = ca[i];
          while (c.charAt(0) == ' ') {
            c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
          }
        }
        return "";
      }


      const UNREGISTERED_GARAGES_WITH_CITY = {
        CST: [{
            title: "True-Fit Auto Works",
            address: "22, Police Court Lane ,, D.N. Road Br. Fort,, behind Bank Of India, Mumbai, Maharashtra 400001",
            number: 9820071528
          },
          {
            title: "Sachin Auto Garage",
            address: "Shop No.4, Kalyanji Lalaji Building, Chandan Wadi Rd, Kamathi Wada, Chira Bazaar, Marine Lines, Mumbai, Maharashtra 400002",
            number: 9892659944
          },
          {
            title: "Royal Garage",
            address: "Shop No 1, Pwd Plot 2, Ground Floor, Dr Maheshwari Rd, Noor Baug, Dongri, Umerkhadi, Mumbai, Maharashtra 400009",
            number: 9833293533,
          },
          {
            title: "Sam Ruston & Company Garage",
            address: "31-33, Adi Murzban Path, Ballard Estate, Fort, Mumbai, Maharashtra 400038",
            number: 2222613416,
          },
        ],

        Bandra: [{
            title: "Galaxy Auto Works",
            address: "18, Genuine House, Shankar Rao Naram Path, Off, Pandurang Budhkar Marg, Worli, Mumbai, Maharashtra 400013",
            number: 9820909845,
          },
          {
            title: "Philips Auto Garage",
            address: "415, 15th Rd, Bandra West, Mumbai, Maharashtra 400050",
            number: 9821079201,
          },
          {
            title: "Anthony Garage",
            address: "St John Rd, Pali Hill, Mumbai, Maharashtra 400050",
            number: 9821079201,
          },
        ],

        Kurla: [{
            title: "Kolhapur Garage",
            address: " Indira Nagar, Parigh Khadi, LBS Marg,, near Maharashtra Weigh Bridge, Christian Gaon, Kurla, Mumbai, Maharashtra 400070",
            number: 2224074408
          },
          {
            title: "Kolhapur Garage",
            address: " Indira Nagar, Parigh Khadi, LBS Marg,, near Maharashtra Weigh Bridge, Christian Gaon, Kurla, Mumbai, Maharashtra 400070",
            number: 2224074408
          },
          {
            title: "Bombay Garage",
            address: "Nausena Vihar Road, near kohinoor international school, Bhartiya Nagar Slum, Kurla West, Kurla, Mumbai, Maharashtra 400070",
            number: 2224074408
          },
          {
            title: "Palav Motor Garage",
            address: "L B S NEAR SHEETAL CINEMA, 70, Lal Bahadur Shastri Rd, Kurla, Mumbai, Maharashtra 400070",
            number: 9869229009
          },
        ],

        Dadar: [{
            title: "Galaxy Auto Works",
            address: "18, Genuine House, Shankar Rao Naram Path, Off, Pandurang Budhkar Marg, Worli, Mumbai, Maharashtra 400013",
            number: 9820909845,
          },
          {
            title: "Highway Garage",
            address: "SK Bole Marg, Dadar West, Prabhadevi, Mumbai, Maharashtra 400028",
            number: 9819030063,
          },
          {
            title: " Ashok Garage",
            address: "Dhuruwadi, Kashinath Dhuru Marg, Chandrakant Dhuru Wadi, Dadar West, Mumbai, Maharashtra 400028",
            number: 2224304546,
          },
          {
            title: "Select Auto Garage",
            address: "29, Gautam Nagar, Dadar, Mumbai, Maharashtra 400014",
            number: 9820909845,
          },
        ],
        matunga: [{
            title: "Galaxy Auto Works",
            address: "18, Genuine House, Shankar Rao Naram Path, Off, Pandurang Budhkar Marg, Worli, Mumbai, Maharashtra 400013",
            number: 9820909845,
          },
          {
            title: "Highway Garage",
            address: "SK Bole Marg, Dadar West, Prabhadevi, Mumbai, Maharashtra 400028",
            number: 9819030063,
          },
          {
            title: " Ashok Garage",
            address: "Dhuruwadi, Kashinath Dhuru Marg, Chandrakant Dhuru Wadi, Dadar West, Mumbai, Maharashtra 400028",
            number: 2224304546,
          },
          {
            title: "Select Auto Garage",
            address: "29, Gautam Nagar, Dadar, Mumbai, Maharashtra 400014",
            number: 9820909845,
          },
        ],
        Virar: [{
            title: "Galaxy Auto Works",
            address: "18, Genuine House, Shankar Rao Naram Path, Off, Pandurang Budhkar Marg, Worli, Mumbai, Maharashtra 400013",
            number: 9820909845,
          },
          {
            title: "Highway Garage",
            address: "SK Bole Marg, Dadar West, Prabhadevi, Mumbai, Maharashtra 400028",
            number: 9819030063,
          },
          {
            title: "Ashok Garage",
            address: "Dhuruwadi, Kashinath Dhuru Marg, Chandrakant Dhuru Wadi, Dadar West, Mumbai, Maharashtra 400028",
            number: 2224304546,
          },
          {
            title: "Select Auto Garage",
            address: "29, Gautam Nagar, Dadar, Mumbai, Maharashtra 400014",
            number: 9820909845,
          },
        ],

        Ghatkopar: [{
            title: "Galaxy Auto Works",
            address: "18, Genuine House, Shankar Rao Naram Path, Off, Pandurang Budhkar Marg, Worli, Mumbai, Maharashtra 400013",
            number: 9820909845,
          },
          {
            title: "Philips Auto Garage",
            address: "415, 15th Rd, Bandra West, Mumbai, Maharashtra 400050",
            number: 9821079201,
          },
          {
            title: "Anthony Garage",
            address: "St John Rd, Pali Hill, Mumbai, Maharashtra 400050",
            number: 9821079201,
          },
        ],

        Thane: [{
            title: "True-Fit Auto Works",
            address: "22, Police Court Lane ,, D.N. Road Br. Fort,, behind Bank Of India, Mumbai, Maharashtra 400001",
            number: 9820071528
          },
          {
            title: "Sachin Auto Garage",
            address: "Shop No.4, Kalyanji Lalaji Building, Chandan Wadi Rd, Kamathi Wada, Chira Bazaar, Marine Lines, Mumbai, Maharashtra 400002",
            number: 9892659944
          },
          {
            title: "Royal Garage",
            address: "Shop No 1, Pwd Plot 2, Ground Floor, Dr Maheshwari Rd, Noor Baug, Dongri, Umerkhadi, Mumbai, Maharashtra 400009",
            number: 9833293533,
          },
          {
            title: "Sam Ruston & Company Garage",
            address: "31-33, Adi Murzban Path, Ballard Estate, Fort, Mumbai, Maharashtra 400038",
            number: 2222613416,
          },
        ],
        Chembur: [{
            title: "Kolhapur Garage",
            address: " Indira Nagar, Parigh Khadi, LBS Marg,, near Maharashtra Weigh Bridge, Christian Gaon, Kurla, Mumbai, Maharashtra 400070",
            number: 2224074408
          },
          {
            title: "Kolhapur Garage",
            address: " Indira Nagar, Parigh Khadi, LBS Marg,, near Maharashtra Weigh Bridge, Christian Gaon, Kurla, Mumbai, Maharashtra 400070",
            number: 2224074408
          },
          {
            title: "Bombay Garage",
            address: "Nausena Vihar Road, near kohinoor international school, Bhartiya Nagar Slum, Kurla West, Kurla, Mumbai, Maharashtra 400070",
            number: 2224074408
          },
          {
            title: "Palav Motor Garage",
            address: "L B S NEAR SHEETAL CINEMA, 70, Lal Bahadur Shastri Rd, Kurla, Mumbai, Maharashtra 400070",
            number: 9869229009
          },
        ],
        nerul: [{
            title: " Ashok Garage",
            address: "Dhuruwadi, Kashinath Dhuru Marg, Chandrakant Dhuru Wadi, Dadar West, Mumbai, Maharashtra 400028",
            number: 2224304546,
          },
          {
            title: "Select Auto Garage",
            address: "29, Gautam Nagar, Dadar, Mumbai, Maharashtra 400014",
            number: 9820909845,
          },
        ],
        mahim: [{
            title: "True-Fit Auto Works",
            address: "22, Police Court Lane ,, D.N. Road Br. Fort,, behind Bank Of India, Mumbai, Maharashtra 400001",
            number: 9820071528
          },
          {
            title: "Sachin Auto Garage",
            address: "Shop No.4, Kalyanji Lalaji Building, Chandan Wadi Rd, Kamathi Wada, Chira Bazaar, Marine Lines, Mumbai, Maharashtra 400002",
            number: 9892659944
          },
          {
            title: "Royal Garage",
            address: "Shop No 1, Pwd Plot 2, Ground Floor, Dr Maheshwari Rd, Noor Baug, Dongri, Umerkhadi, Mumbai, Maharashtra 400009",
            number: 9833293533,
          },
          {
            title: "Sam Ruston & Company Garage",
            address: "31-33, Adi Murzban Path, Ballard Estate, Fort, Mumbai, Maharashtra 400038",
            number: 2222613416,
          },
        ],
      }

      function load_unregistered_garages() {


        const garagesData = UNREGISTERED_GARAGES_WITH_CITY[loc_name];

        if (garagesData) {

          let UNREGISTERED_GARAGE_LIST_HTML = "";

          for (const obj of garagesData) {
            let s = `<div class="row">

        <div class="row" style="width:100%">
          <div class="card" style="border:1px solid black; padding:12px; border-radius:20px; margin-left:34%; width:35%; margin-bottom:20px">
            <div class="service-item row sir-parent" id="available-item-1">

              <div class="sir-cont">
                <div class="item-description col-md-6 text-left">
                  <h4><b>${obj.title}</b></h4>
                  <p class="sr-items-subtext">
                    ${obj.address}
                  </p>

                </div>

                <div class="item-book col-md-6 text-right">


                  <p style="font-size:11px;">

                    <button class="btn btn-block btn-primary  btn-success" id="addToCartButton_8" onclick='cancelRequest(${obj.number})'  style="width:80px;float:right;margin-right:4px;"> <i class="fa fa-phone" aria-hidden="true"></i> Connect</button>
                  </p>

                </div>
              </div>
            </div>

            <br>

          </div>
        </div>

      </div>`;


            UNREGISTERED_GARAGE_LIST_HTML += s;
          }

          $("#unregistered-garage-lists").html(UNREGISTERED_GARAGE_LIST_HTML);

        }

      }


      function cancelRequest(num) {
        if(confirm("This will cancel your current request, are you sure?")){
          $.post("cancel_request.php", {},
          function(data, status) {
            alert("Request has been cancelled!")
            window.location.href="tel:"+num;
            window.location.href="select_car.php";
          });
        }
      }
    </script>

    <script>
      $(document).ready(function() {
        load_unregistered_garages();
      });
    </script>

  </body>

<?php

}

?>