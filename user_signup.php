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
  <div class="modal fade" id="user_signup_Modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:25px 30px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="signup_header">SignUp</h4>
        </div>
        <div class="modal-body" style="padding:30px 40px;">
         <form id="signup-form">
            <div class="form-group">
                <label>Name</label>
                <input type="text" id="signup-name" name="user_name" class="form-control" placeholder="your name" required>
            </div>
            <div class="form-group">
                <label>Email Id</label>
                <input type="email" id="signup-email" name="user_email" class="form-control" placeholder="demo@gmail.com" required>
            </div>
             <div class="form-group">
                <label>Phone no</label>
                <input type="number" id="signup-phone" name="user_phoneno" class="form-control" placeholder="phone no" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" id="signup-pass" name="user_pass" class="form-control" placeholder="password" required>
            </div>
            
            <div class="form-group">
                <button type="submit" id="signup-submit-btn" class="btn btn-primary btn-block btn-lg" name="sign_up">Signup</button>
            </div>
            <!-- <?php include("user_signup_code.php"); ?>  -->
        </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>Already have an account? <a data-toggle="modal" data-target="#user_signin_Modal" data-dismiss="modal">Click here</a></p>

        </div>
      </div>
      
    </div>
  </div> 
</div>
 
<script>
$(document).ready(function(){
  $("#myBtn").click(function(){
    $("#user_signup_Modal").modal();
  });

  let form = document.getElementById("signup-form");
  form.addEventListener('submit', event => {
    event.preventDefault();
    handleSubmit(event);
})

});

function setLoading (state=true){
   if(state){
     $("#signup-submit-btn").html("Loading...");
   }else{
     $("#signup-submit-btn").html("Signup");
   }
  $("#signup-submit-btn").prop('disabled', state);
}

function ValidateEmail(mail) 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
  {
    return true;
  }
    return false;
}

function handleSubmit(e){

  let name = $("#signup-name").val();
  let email = $("#signup-email").val();
  let phone = $("#signup-phone").val();
  let pass = $("#signup-pass").val();

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

  setLoading(true);

  $.post("user_signup_code.php",
  {
    user_name: name,
    user_email:email,
    user_phoneno:phone,
    user_pass:pass
  },
  function(data, status){
    setLoading(false);
    if(data.includes("err")){
      let errArr = data.split(",");
      //error message
      alert(errArr[1]);
    }else if(data.includes("success")){
      $("#user_signup_Modal").modal("toggle");
      $("#user_signin_Modal").modal();
    }
  });
}

</script>

</body>
