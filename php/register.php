<?php
include 'session.php';
$conn = start_session();

$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

/* Aids against sql injection */
$user_email = $conn->real_escape_string($email);
$user_password = $conn->real_escape_string($password);

/*auto increment pk therefore you can use 0*/
$userSQL = "INSERT INTO User VALUES (0,'$user_email','$user_password')";

function error_return(){
	echo 'This email has account already! You will be redirected to the login page in 5 seconds.';
  ?>
  <!--Starts a 5 second timer then returns the user to the login page-->
  <script>
			var timer = setTimeout(function() {window.location='../login.html' }, 5000);
	</script>
  <?php
}

/*Identify repeating email*/
$sql = "SELECT COUNT(User_Id) FROM User WHERE User_Email = '$user_email'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)) {
  $newEmail = $row['COUNT(User_Id)'];
}

/*Creates the user if the email doesn't exist*/
if($newEmail >= 1){
  error_return();
}
else{
  $conn->query($userSQL);
  header("location: ../login.html");
}
