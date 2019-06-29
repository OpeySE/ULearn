<?php
function start_session(){
  session_start();
  /* Instialises the database */
  $conn = new mysqli("localhost", "root", "pass", "ulearn");
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
