<?php
include 'session.php';
$conn = start_session();
session_destroy();
header("Location: ../");
?>
