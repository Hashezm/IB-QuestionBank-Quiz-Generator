<?php
$conn = mysqli_connect("localhost","hashem","","questionbank");
if(!$conn){
  echo "connection unsuccessful" . mysqli_connect_error();

}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<style>
  form {
    width: 300px;
    margin: 50px auto;
    text-align: center;
  }
  input[type="text"], input[type="password"] {
    padding: 10px;
    margin: 10px;
    width: 250px;
    font-size: 16px;
    border: 1px solid #ccc;
  }
  input[type="submit"] {
    padding: 10px 20px;
    background-color: lightblue;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    margin-top: 10px;
  }
  input[type="submit"]:hover {
    background-color: blue;
  }
</style>
</head>
  <body>
    <!-- script to not submit on refresh -->
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
<form method="POST">
  <!-- text input to log in -->
  <input type='text' name='UsernameEmail' value='' placeholder='Username / Email' required>

  <input type='password' name='Password' value='' placeholder='Password' required>

  <br><br><input type='submit' name='submit' value='login'>
  <?php
  // select all users from user database and save in 2D array
    $sql = 'SELECT * FROM user';

    $result = mysqli_query($conn, $sql);

    $array = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // receiving value from form
    if (isset($_POST['submit']) and ! empty($_POST['submit'])) {
      session_start(); // start session to save username of user that will log in
      $inputUsernameEmail = $_POST['UsernameEmail'];
      $inputPassword = $_POST['Password'];
      $_SESSION['username'] = 0; // define SESSION variabe to save username
      foreach ($array as $row) { // for loop to take each row of 2D array individually
        if ($inputUsernameEmail == $row['Username'] or $inputUsernameEmail == $row['UserEmail']) { // if either username or email match that of database
          $_SESSION['username']= $row['Username']; // save username in session variable
          $result = mysqli_query($conn, "SELECT Password FROM user WHERE Username='{$_SESSION['username']}'"); // select password matching username
          $resultArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
          $databasePassword = $resultArray[0]['Password']; // fetch database password
          if ($inputPassword == $databasePassword) { // check if inputted password matches db password
            header("Location: http://localhost/questionbank/firstpage.php", true, 301); // if true send to first page
            exit();
          }else{
            echo "incorrect password, please try again"; // if not ask to try again
          }
          break;
        }

      }
      if ($_SESSION['username'] == 0) { // if username does not exist in database refer user to registeration page
        echo "username/email is not registered. <a href='http://localhost/questionbank/register.php'>register?</a>";
      }
  }




?></form>

  </body>
</html>
