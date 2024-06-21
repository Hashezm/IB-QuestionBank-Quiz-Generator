<?php
session_start();
$questions = array();
if (empty($_SESSION)) {
  header("Location: index.php");
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Recent tests</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <style>
      body {
        text-align: center;
      }

      h1 {
        font-size: 36px;
        font-weight: bold;
      }

      button {
        font-size: 18px;
        font-weight: bold;
        padding: 10px 20px;
        border-radius: 10px;
      }
    </style>
  </head>
  <body>
    <h1>Congratulations on completing the test <?php echo ($_SESSION['username']); ?></h1>
    <br><br><br><br><br>
    <?php array_push($questions, $_SESSION['doneTest']); ?>
    <form method="POST">
      <button type='submit' name='back'>Take me back</button>
      <?php if (isset($_POST['back'])){
        header("Location: firstpage.php", true, 301);
      }
      ?>
    </form>
  </body>
</html>
