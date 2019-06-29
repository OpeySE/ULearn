<!DOCTYPE HTML>
<?php
include '../php/session.php';
$conn = check_session();
$User_Id = $_SESSION['user'];
?>

<html>
<head lang="en">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="../style/index.css">
  <link rel="stylesheet" href="../style/userdetails.css">
  <title>ULearn</title>
</head>

<body>
  <nav>
    <header>
      <a>ULearn</a>
    </header>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="userdetails.php">User Details</a></li>
      <li><a href="../php/logout.php">Logout</a></li>
    </ul>
  </nav>

  <main>
    <h1>Last 3 Test Results in English</h1>
    <table width="600" border="3" cellpadding="1" cellspacing="1">
		  <tr>
		    <th>Subject</th>
		    <th>Level</th>
        <th>Score</th>
		  <tr>

		<?php
    $sql = "SELECT Subject, Level, Score FROM UserScore WHERE User_Id = '".$User_Id."' AND Subject='English' ORDER BY UserScore_Id DESC LIMIT 3";
    $records = mysqli_query($conn,$sql);

    /* Format the stored SQL statements into the table*/
    while($question = $records -> fetch_assoc()){
      echo "<tr>";
      echo "<td>".$question['Subject']."</td>";
      echo "<td>".$question['Level']."</td>";
      echo "<td>".$question['Score']."</td>";
      echo "</tr>";
    }
		?>
		</table>

    <h1>Last 3 Test Results in Maths</h1>
    <table width="600" border="3" cellpadding="1" cellspacing="1">
		  <tr>
		    <th>Subject</th>
		    <th>Level</th>
        <th>Score</th>
		  <tr>

		<?php
    $sql = "SELECT Subject, Level, Score FROM UserScore WHERE User_Id = '".$User_Id."' AND Subject='Math' ORDER BY UserScore_Id DESC LIMIT 3";
    $records = mysqli_query($conn,$sql);

    /* Format the stored SQL statements into the table*/
    while($question = $records -> fetch_assoc()){
      echo "<tr>";
      echo "<td>".$question['Subject']."</td>";
      echo "<td>".$question['Level']."</td>";
      echo "<td>".$question['Score']."</td>";
      echo "</tr>";
    }
		?>
		</table>

    <h1>Last 3 Test Results in Computing</h1>
    <table width="600" border="3" cellpadding="1" cellspacing="1">
		  <tr>
		    <th>Subject</th>
		    <th>Level</th>
        <th>Score</th>
		  <tr>

		<?php
    $sql = "SELECT Subject, Level, Score FROM UserScore WHERE User_Id = '".$User_Id."' AND Subject='Computing' ORDER BY UserScore_Id DESC LIMIT 3";
    $records = mysqli_query($conn,$sql);

    /* Format the stored SQL statements into the table*/
    while($question = $records -> fetch_assoc()){
      echo "<tr>";
      echo "<td>".$question['Subject']."</td>";
      echo "<td>".$question['Level']."</td>";
      echo "<td>".$question['Score']."</td>";
      echo "</tr>";
    }
		?>
		</table>

	</main>

</html>
