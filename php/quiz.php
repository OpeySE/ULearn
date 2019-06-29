<?php
include 'session.php';
$conn = start_session();

/*Formats the post value - Level_Subject*/
$type = $_POST['type'];
$level = strtok( $type, '_' );
$subject = strtok( '' );

function random_questions($level,$subject,$conn){
  return $questions = $conn->query("SELECT Question_Id, Question_Description, Question_Option FROM Question INNER JOIN $subject ON Question.Question_Id = $subject.Id AND $subject.Level ='$level' ORDER BY RAND() LIMIT 5");
}
?>

<html>
<head lang="en">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="../style/index.css">
  <link rel="stylesheet" href="../style/quiz.css">
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
    <div class="container">
      <div class="floatLeft">
          <table width="100%" border="1" cellpadding="0.5" cellspacing="0.5">
            <tr>
              <th>Question</th>
              <th>Options</th>
            </tr>

            <?php
            $questions = random_questions($level,$subject,$conn);
            /* Format the stored SQL statements into the table*/
            while($question = $questions ->fetch_assoc()){
              echo "<tr>";
              echo "<td>".$question['Question_Description']."</td>";
              echo "<td>".$question['Question_Option']."</td>";
              echo "</tr>";
              $questionIds[] = $question['Question_Id'];
            }
            ?>
          </table>
      </div>

      <form action="result.php" method="post">
        <input type="hidden" name="subject" value="<?php echo $subject; ?>">
        <input type="hidden" name="level" value="<?php echo $level; ?>">

        <div class="floatRight">
          <table width="100%" border="1" cellpadding="0.5" cellspacing="0.5">
            <tr>
              <th>Your answer</th>
            </tr>
            <tr>
              <input type="hidden" name="question1id" value="<?php echo $questionIds[0];?>">
              <td><input type='text' placeholder='Write your answer' name="q1"></td>
            </tr>
            <tr>
              <input type="hidden" name="question2id" value="<?php echo $questionIds[1];?>">
              <td><input type='text' placeholder='Write your answer' name="q2"></td>
            </tr>
            <tr>
              <input type="hidden" name="question3id" value="<?php echo $questionIds[2];?>">
              <td><input type='text' placeholder='Write your answer' name="q3"></td>
            </tr>
            <tr>
              <input type="hidden" name="question4id" value="<?php echo $questionIds[3];?>">
              <td><input type='text' placeholder='Write your answer' name="q4"></td>
            </tr>
            <tr>
              <input type="hidden" name="question5id" value="<?php echo $questionIds[4];?>">
              <td><input type='text' placeholder='Write your answer' name="q5"></td>
            </tr>
          </table>
        </div>

        <button name="quizSubmit" type="submit">Submit</button>
      </form>
    </div>

  </main>

</body>
<html>
