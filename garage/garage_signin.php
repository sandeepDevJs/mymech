<style>
  .modal-header, .signin_header, .close {
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
  <div class="modal fade" id="garage_signin_Modal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:25px 30px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="signin_header"><span class="glyphicon glyphicon-lock"></span> Garage Login</h4>
        </div>
        <div class="modal-body" style="padding:30px 40px;">
        <form id="garage-sign-in-form">
            <div class="form-group">
                <label>Garage Email</label>
                <input type="email" id="garage-sign-in-email" name="email" class="form-control" placeholder="demo@gmail.com">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" id="garage-sign-in-pass" name="pass" class="form-control" placeholder="password">
            </div>
            <div class="form-group">
                <button type="submit" id="garage-sign-in-btn" class="btn btn-primary btn-block btn-lg" name="garage_sign_in">Login</button>
            </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>Don't have an account? <a data-toggle="modal" data-target="#garage_signup_Modal" data-dismiss="modal">Click here</a></p>

        </div>
      </div>

    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  $("#myBtn").click(function(){
    $("#garage_signin_Modal").modal();
  });


  let GarageSignInform = document.getElementById("garage-sign-in-form");
  GarageSignInform.addEventListener('submit', event => {
    event.preventDefault();
    handleGarageSignInSubmit(event);
  });

});



function setSignInGarageLoading (state=true){
   if(state){
     $("#garage-sign-in-btn").html("Loading...");
   }else{
     $("#garage-sign-in-btn").html("SignIn");
   }
  $("#garage-sign-in-btn").prop('disabled', state);
}

function handleGarageSignInSubmit(e){

  let email = $("#garage-sign-in-email").val();
  let pass = $("#garage-sign-in-pass").val();

  if(!ValidateEmail(email)){
    alert("Invalid email!");
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

  setSignInGarageLoading(true);

  $.post("garage/garage_signin_code.php",
  {
    email:email,
    pass:pass
  },
  function(data, status){
    setSignInGarageLoading(false);
    if(data.includes("err")){
      let errArr = data.split(",");
      //error message
      alert(errArr[1]);

    }else if(data.includes("success")){
      $("#garage_signin_Modal").modal("toggle");
      window.location.href = 'garage/garage_index.php'
    }
  });

}

</script>

</body>
