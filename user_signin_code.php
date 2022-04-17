<?php 

include("DBconfig.php");

if(count($_POST) > 0){
	session_start();
	$email = htmlentities(mysqli_real_escape_string($conn, $_POST['email']));
	$pass = htmlentities(mysqli_real_escape_string($conn, $_POST['pass']));

	$select_user= "select * from user_signup where user_email='$email' AND user_pass='$pass'";

	$query = $conn->query($select_user);
	$check_user = mysqli_num_rows($query);

	if($check_user == 1){
		$_SESSION['user_email']=$email;

		$update_msg = mysqli_query($conn, "UPDATE user_signup SET log_in='Online' WHERE user_email='$email' ");

		$user = $_SESSION['user_email'];
		$get_user = "Select * from user_signup where user_email = '$user' ";
		$run_user = mysqli_query($conn, $get_user);
		$row = mysqli_fetch_array($run_user);

		$user_name = $row['user_name'];

		$_SESSION['login'] = 'true';
		$_SESSION['user_name'] = $user_name;
		$_SESSION['user_id'] = $row['user_id'];
		echo "success,Registered Successfully!";

	}
	else{
		echo "err,Invalid email and password";
	}
}

?>