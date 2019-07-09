<?php
function start_session(){
  /* Instialise your database */
  $conn = new mysqli("localhost", "username", "password", "databaseName");
  if ($conn->connect_error) {
  	exit("Database error!");
  }
  return $conn;
}

function check_session(){
  $conn = start_session();
  if (!isset($_SESSION['user'])) {
  	header("Location: ../login.html");
  }
  return $conn;
}
?>
