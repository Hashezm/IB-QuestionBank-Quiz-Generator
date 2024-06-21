<?php
$questionID = 0;
$questions = array();
$conn = mysqli_connect("localhost","hashem","","questionbank");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Practice test</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <style>
      form {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
      }
      select {
        margin: 20px;
        padding: 10px;
        font-size: 18px;
        border: 1px solid gray;
        border-radius: 5px;
      }
      input[type="submit"] {
        margin: 20px;
        padding: 10px 20px;
        font-size: 18px;
        border: none;
        border-radius: 5px;
        background-color: lightblue;
        color: white;
        cursor: pointer;
      }
    </style>
    <script type="text/javascript">
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
    </script>
  </head>
  <body>
    <form method="post" action="practicetest.php"> <!-- refer information from form to practicetest.php-->
      <?php
      // retrieve all units and save in 2D array
      $abitofsql = 'SELECT * FROM unit';
      $unitResult = mysqli_query($conn, $abitofsql);
      $unitArray = mysqli_fetch_all($unitResult, MYSQLI_ASSOC);
      ?>
      <select name='units[]' multiple style="height:175px"> <!-- multiple selection for units -->
      <?php
      foreach ($unitArray as $unit) { // loop through 2D array as individual rows
        echo "<option value='{$unit['UnitID']}'>{$unit['UnitName']}</option>"; // display unit options for user to choose
      }
      ?>
      </select>
      <select name="testtime"> <!-- display options to allow users to select test time -->
        <option value="30">30 Minutes</option>
        <option value="45">45 Minutes</option>
        <option value="60">1 hr</option>
        <option value="90">1hr 30 min</option>
        <option value="120">2hr</option>
      </select>
      <input type="submit" name="submit" value="Start test!">
    </form>
  </body>
</html>
