<!DOCTYPE html>
<?php
include 'session.php';
$conn = start_session();
?>
<html>

  <head lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="../style/index.css">
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
      <section class="row">
        <section class="column" style="background-color:#195cd1;">
          <form action="quiz.php" method="post">
            <h2>English</h2>
            <p>Select a Level</p>
            <div class="btn-group">
              <button name="type" type="submit" value="Easy_English" style="background-color:green">Easy</button>
              <button name="type" type="submit" value="Medium_English " style="background-color:orange">Medium</button>
              <button name="type" type="submit" value="Hard_English" style="background-color:red">Advanced</button>
            </div>
           </form>
        </section>

        <section class="column" style="background-color:#1868d1;">
          <form action="quiz.php" method="post">
            <h2>Maths</h2>
            <p>Select a Level</p>
            <div class="btn-group">
              <button name="type" type="submit" value="Easy_Math" style="background-color:green">Easy</button>
              <button name="type" type="submit" value="Medium_Math" style="background-color:orange">Medium</button>
              <button name="type" type="submit" value="Hard_Math" style="background-color:red">Advanced</button>
            </div>
          </form>
        </section>

        <section class="column" style="background-color:#187ad1;">
          <form action="quiz.php" method="post">
            <h2>Computing</h2>
            <p>Select a Level</p>
            <div class="btn-group">
              <button name="type" type="submit" value="Easy_Computing" style="background-color:green">Easy</button>
              <button name="type" type="submit" value="Medium_Computing" style="background-color:orange">Medium</button>
              <button name="type" type="submit" value="Hard_Computing" style="background-color:red">Advanced</button>
            </div>
          </form>
        </section>
      </section>

    </main>

    <footer>
      <p>&copy uLearn 2019 </p>
    </footer>

  </body>
</html>
