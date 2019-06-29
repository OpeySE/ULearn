<?php
	include 'session.php';
	$conn = start_session();

  $email = $_POST['email'];

  /*User info from the database: $sql[User_Id, User_Email, User_Password]*/
	$result = $conn->query("SELECT User_Id, User_Email, User_Password FROM User WHERE User_Email = '".$email."'");
  $sql = $result->fetch_assoc();

	/*Get the hash password*/
	$hash = $sql['User_Password'];

  if (($sql['User_Email'] == $email ) && (password_verify($_POST['password'], $hash))){
    /*set the session user and redirect the user*/
    $_SESSION['user'] = $sql['User_Id'];
    header("location: index.php");
	} else {header("location: ../login.html");}
?>
