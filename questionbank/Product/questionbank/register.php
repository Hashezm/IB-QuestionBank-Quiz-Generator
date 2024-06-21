<?php
$conn = mysqli_connect("localhost","hashem","","questionbank");
if(!$conn){
  echo "connection unsuccessful" . mysqli_connect_error();
}

// print_r($array);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
 <meta charset="utf-8">
 <title>Register</title>
 <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
 <style>
   form {
     display: flex;
     flex-direction: column;
     align-items: center;
     padding: 20px;
   }

   input[type="text"],
   input[type="password"],
   input[type="email"] {
     width: 50%;
     padding: 10px;
     margin-bottom: 20px;
     font-size: 16px;
     border: 1px solid gray;
     border-radius: 5px;
   }

   input[type="submit"] {
     padding: 10px 20px;
     background-color: blue;
     color: white;
     border: none;
     border-radius: 5px;
     cursor: pointer;
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
<!-- input texts for user registration -->
  <input type='text' name='Username' value='' placeholder='Username' required>
  <input type='password' name='Password' value='' placeholder='Password' required>
  <input type='email' name='UserEmail' value='' placeholder='example@email.com' required>
  <input type='text' name='FirstName' value='' placeholder='firstname' required>
  <input type='text' name='LastName' value='' placeholder='lastname' required>
  <br><br><input type='submit' name='submit' value='Register'>
<?php
    // receiving value from form
    if (isset($_POST['submit'])) {
      $username = $_POST['Username'];
      $password = $_POST['Password'];
      $email = $_POST['UserEmail'];
      $first = $_POST['FirstName'];
      $last = $_POST['LastName'];
      // insert values into user database
      $insertsql = "INSERT INTO user (UserEmail, Username, FirstName, LastName, Password) VALUES('$email','$username','$first','$last','$password')";
      $runquery = mysqli_query($conn, $insertsql);
      echo "<br><br>User registered" . "<a href='index.php'> login</a>";
  }



?></form><a href="#"></a>
  </body>
</html>
