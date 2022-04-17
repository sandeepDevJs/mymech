<?php ?>
<head>
  <style>
  .modal-header, .signup_header, .close {
    background-color: #5cb85c;
    color:white !important;
    text-align: center;
    font-size: 25px;
  }
  .modal-footer {
    background-color: #f9f9f9;
  }
  </style>
</head>
<body>
  <!-- Trigger the modal with a button -->


  <!-- Modal -->
  <div class="modal fade" id="garage_signup_Modal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:25px 30px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="signup_header">Garage SignUp</h4>
        </div>
        <div class="modal-body" style="padding:30px 40px;">
         <form id="garage-sign-up-form" action="" method="post">
            <div class="form-group">
                <label>Garage Name</label>
                <input type="text" id="garage-sign-up-name" name="garage_name" class="form-control" placeholder="your garage name" required>
            </div>
            <div class="form-group">
                <label>Garage Email Id</label>
                <input type="email" id="garage-sign-up-email" name="garage_email" class="form-control" placeholder="demo@gmail.com" required>
            </div>
             <div class="form-group">
                <label>Garage Phone no.</label>
                <input type="number" id="garage-sign-up-phone"  name="garage_phoneno" class="form-control" placeholder="phone no" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" id="garage-sign-up-pass" name="garage_pass" class="form-control" placeholder="password" required>
            </div>
            <div class="form-group">
                <label>Garage Area Location</label>
                <select id="garage-sign-up-location" name="locations[]" class="form-control" required>

                  <?php

include 'DBconfig.php';

$qr  = "SELECT location FROM location";
$res = $conn->query($qr);

foreach ($res as $r) {
    echo "<option value = " . $r['location'] . ">" . $r['location'] . "</option>";
}

?>

                </select>
            </div>
            <div class="form-group">
                <label>Garage Address</label>
                <textarea id="garage-sign-up-address" name="garage_add"  class="form-control" placeholder="full address" cols="" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <button type="submit" id="garage-sign-up-btn" class="btn btn-primary btn-block btn-lg" name="garage_sign_up">Signup</button>
            </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>Already have an account? <a data-toggle="modal" data-target="#garage_signin_Modal" data-dismiss="modal">Click here</a></p>

        </div>
      </div>

    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  $("#myBtn").click(function(){
    $("#garage_signup_Modal").modal();
  });

  let form = document.getElementById("garage-sign-up-form");
  form.addEventListener('submit', event => {
    event.preventDefault();
    handleGarageSignUpSubmit(event);
})

});

function setGarageSignUpLoading (state=true){
   if(state){
     $("#garage-sign-up-btn").html("Loading...");
   }else{
     $("#garage-sign-up-btn").html("Signup");
   }
  $("#garage-sign-up-btn").prop('disabled', state);
}

function handleGarageSignUpSubmit(e){

  let name = $("#garage-sign-up-name").val();
  let email = $("#garage-sign-up-email").val();
  let phone = $("#garage-sign-up-phone").val();
  let pass = $("#garage-sign-up-pass").val();
  let location = $("#garage-sign-up-location").val();
  let address = $("#garage-sign-up-address").val();

  if(name.length<3){
    alert("Name Must Be At Least 3 Character long");
    return;
  }

  if(name.length>20){
    alert("Name Cannot Be More Than 20 Character long");
    return;
  }

  if(!ValidateEmail(email)){
    alert("Invalid email!");
    return;
  }

  if(phone.length != 10){
    alert("Phone number should be 10 digits.");
    return;
  }


  if(pass.length < 8){
    alert("Password Length Must Be At Least 8 Character long");
    return;
  }

  if(pass.length > 15){
    alert("Password Length Cannot Be More Than 15 Character long");
    return;
  }

  if (address.length < 10) {
    alert("Address is too small!");
    return;
}

if (address.length > 80) {
    alert("Address is too large!");
    return;
}

  setGarageSignUpLoading(true);

  $.post("garage/garage_signup_code.php",
  {
    garage_name: name,
    garage_email:email,
    garage_phoneno:phone,
    garage_pass:pass,
    garage_add:address,
    locations:[location],
  },
  function(data, status){
    setGarageSignUpLoading(false);
    if(data.includes("err")){
      let errArr = data.split(",");
      //error message
      alert(errArr[1]);
    }else if(data.includes("success")){
      $("#garage_signup_Modal").modal("toggle");
      $("#garage_signin_Modal").modal();
    }
  });
}


</script>

</body>
