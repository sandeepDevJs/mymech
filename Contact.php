<head>
  <style>
  .modal-header, .contact_header, .close {
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
  <div class="modal fade" id="contact" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:25px 30px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="contact_header">Contact Us</h4>
        </div>
        <div class="modal-body" style="padding:30px 40px;">
         <form action="" method="post">
            <div class="form-group">
                <label>Your Name</label>
                <input type="text" name="name" class="form-control" placeholder="your name" required>
            </div>
            <div class="form-group">
                <label>Your Email</label>
                <input type="email" name="email" class="form-control" placeholder="demo@gmail.com" required>
            </div>
            <div class="form-group">
                <label>Message</label>
                <textarea name="message"  class="form-control" placeholder="write your message" cols="" rows="2" required></textarea>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg" name = "contact_us">Send</button>
            </div>
            <?php 

                include("DBconfig.php");

                if(isset($_POST['contact_us'])){

                    $name = htmlentities(mysqli_real_escape_string($conn, $_POST['name']));
                    $email = htmlentities(mysqli_real_escape_string($conn, $_POST['email']));
                    $message = htmlentities(mysqli_real_escape_string($conn, $_POST['message']));
                    

                    if ($name == '') {

                        echo "<script>alert('Please enter your name')</script>";
                        echo "<script>window.open('index.php','_self')</script>";
                        exit();
                    }
                    if ($email == '') {

                        echo "<script>alert('Please enter your email')</script>";
                        echo "<script>window.open('index.php','_self')</script>";
                        exit();
                    }
                    if ($message == '') {

                        echo "<script>alert('Please enter your message')</script>";
                        echo "<script>window.open('index.php','_self')</script>";
                        exit();
                    }

                    $insert = "insert into contact (name, email, message) values('$name', '$email', '$message')";

                    $query= mysqli_query($conn, $insert);

                    if ($query) {
                        echo"<script>alert('Our team will Contact within 24hrs')</script>";
                        

                        echo"<script> window.open('index.php', '_self')</script>";

                    }
                    else{
                        echo"<script>alert('failed, try again')</script>";
                        echo"<script> window.open('index.php', '_self')</script>";
                    }

                }

             ?> 
        </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
         </div>
      </div>
      
    </div>
  </div> 
</div>
 
<script>
$(document).ready(function(){
  $("#myBtn").click(function(){
    $("#contact").modal();
  });
});
</script>

</body>
