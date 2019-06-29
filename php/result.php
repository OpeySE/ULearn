<?php
include 'session.php';
$conn = check_session();
$User_Id = $_SESSION['user'];

if (isset($_POST['q1']) && isset($_POST['q2']) || isset($_POST['q3']) || isset($_POST['q4']) || isset($_POST['q5'])) {
	$score = 0;
	$records;

  for ($i = 1; $i <= 5; $i++) {

	  /*Get name then get its value (Question_Id) */
  	$answer = $conn->query("SELECT Question_Answer FROM Question WHERE Question_Id = ".$_POST['question'.$i.'id']."");

		/*Check the user answers*/
    while ($ans = $answer->fetch_assoc()) {
			$userAnswer = $_POST['q'.$i];
      $correctAnswer =  $ans['Question_Answer'];

      if ($userAnswer == $correctAnswer) {
  			$score += 1;
  		}
    }
		$sql[] = "SELECT * FROM Question WHERE Question_Id = ".$_POST['question'.$i.'id']."";
	}
	$conn->query("INSERT INTO userscore VALUES (CURRENT_TIMESTAMP(), $User_Id, '$score', '{$_POST['subject']}', '{$_POST['level']}')");
}
?>

<html>
<head lang="en">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="../style/index.css">
  <link rel="stylesheet" href="../style/result.css">
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
		<h1>Your Score is: <?php echo $score?> /5</h1>
		<p>In the table below are the questions asked and the correct answers</p>

		<table width="600" border="1" cellpadding="1" cellspacing="1">
		  <tr>
		    <th>Question</th>
		    <th>The Correct Answer</th>
		  <tr>

		<?php
		for ($i = 0; $i <= 4; $i++){
			$records = mysqli_query($conn,$sql[$i]);

			/* Format the stored SQL statements into the table*/
			while($question = $records -> fetch_assoc()){
			  echo "<tr>";
			  echo "<td>".$question['Question_Description']."</td>";
			  echo "<td>".$question['Question_Answer']."</td>";
			  echo "</tr>";
			}
		}
		?>
		</table>
	</main>
</html>
