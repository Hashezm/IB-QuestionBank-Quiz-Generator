<?php
// start session to save username across tabs
session_start();

// if username does not exist destroy session and log user out
if(!isset($_SESSION['username'])){
  session_destroy();
  header("Location: http://localhost/questionbank/", true, 301);
  exit();
}

$questionID = 0; // define variable to prevent duplicating questions

// establish connection with database
$conn = mysqli_connect("localhost","hashem","","questionbank");
if(!$conn){
  echo "connection unsuccessful" . mysqli_connect_error();
}

// fetch all database rows and save in 2D array
$sql = 'SELECT * FROM question';

$result = mysqli_query($conn, $sql);

$array = mysqli_fetch_all($result, MYSQLI_ASSOC);

// define unit and section variable in empty string
$unit_= "";
$section="";

//method to print questions given an 2D array of questions from the database
function printQuestion($array)
{
  foreach ($array as $key) { // foreach loop taking each row individually
    $conn = mysqli_connect("localhost","hashem","","questionbank"); // reestablish database connection

    // select units matching questionID from many to many relationship joint table

    $sql = "SELECT UnitID FROM question_unit WHERE QuestionID = '{$key['QuestionID']}'";

    $result = mysqli_query($conn, $sql);
    //fetch units as a 2D array
    $unitarray = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // define variable containing size of array of units
    $unitArraySize = count($unitarray);
    // define counter variable to help in printing correct number of commas between units
    $commaCounter = 0;


    echo "<div class='question'";
    echo "<h3 style='margin-top: 10px; margin-bottom: 10px;'>Section {$key['QuestionSection']}</h3>";
    echo "<h3 style='margin-top: 10px; margin-bottom: 10px;'>Unit(s):";

    // foreach loop to print unitIDs
    foreach ($unitarray as $unitkey) {
      echo "{$unitkey['UnitID'][0]}" . "." . "{$unitkey['UnitID'][1]}"; // separate string into two characters with dot in between
      $commaCounter++; // increment commaCounter
      if ($commaCounter < $unitArraySize) { // if commaCounter less than size of array print a comma, removing comma from end of display
        echo "," . " ";
      }
    }

    echo "</h3>";
// end of selecting and outputting unit
    echo "<h4 style='margin-top: 10px; margin-bottom: 10px;'>Title: {$key['QuestionName']}</h4>";
// retrieve question img source and markscheme image source and use explode function if there are multiple sources to put them in arrays
    $questionArray = (explode(',',$key['QuestionSrc']));
    $markschemeArray = (explode(',',$key['MarkschemeSrc']));
    foreach ($questionArray as $question) {
      echo "<img src='{$question}' id='question'></img>";
    }
    $markschemeCounter = 0; //counter to output order of markscheme being displayed
    foreach ($markschemeArray as $markscheme) {
      $markschemeCounter = $markschemeCounter + 1;
      echo "<a href='{$markscheme}'><button type='button' name='button' id = 'button' href=>Markscheme (" . $markschemeCounter . ")</button></a>";

    }
    echo "</div>";
  }

}


// print_r($array);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>CS Questionbank</title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<link rel="stylesheet" href="firstpage.css">
<script src="https://kit.fontawesome.com/989573e242.js" crossorigin="anonymous"></script>
<style>
  .question {
    margin: 20px;
    border: 1px solid black;
    padding: 10px;
  }

  #question {
    width: 500px;
    height: auto;
    margin-bottom: 10px;
  }

  #button {
    background-color: lightblue;
    padding: 7px 10px;
    border-radius: 5px;
    border: none;
    font-weight: bold;
    text-decoration: none;
    color: white;
    margin-top: 10px;
  }
  input[type='submit'] {
  position: absolute;
  left: 990px;
  top: 100px;
  padding: 12px 20px 15px;
  background-color: blue;
  color: white;
  border-radius: 4px;
  border: none;
  font-size: 16px;
  cursor: pointer;
}
#unitidbruv, #sectionid {
  font-size: 16px;
  padding: 10px;
  border-radius: 5px;
  border: 2px solid gray;
  width: 200px;
  height: 40px;
  margin: 10px 0;
}

#searchQuestion{
  position: relative;
  left: 0px;
  top: 0px;
}
</style>
</head>

  <body>
    <!-- <div class="nav-bar">
      <div class="items">
        <i class="fa-solid fa-house"></i>
        <p>Home</p>
      </div>
      <div class="items">
        <i class="fa-solid fa-address-card"></i>
        <p>About</p>
      </div>
      <div class="items">
        <i class="fa-light fa-file-circle-plus"></i>
        <p>Test</p>
      </div>
      <div class="items">
        <i class="fa-solid fa-user"></i>
        <p>User</p>
      </div>
    </div> -->
    <form method="POST">
      <input style = 'position:relative; left:1300px; top:1px;' type='submit' name='logout' value='Logout'>
      <?php if (isset($_POST['logout'])){ // if logout button is pressed destroy session and take user to login page
        session_destroy();
        header("Location: http://localhost/questionbank/", true, 301);
        exit();
      }
         ?>
    </form>
    <form method="POST">
      <input style = 'position:relative; left:1290px; top:20px;' type='submit' name='test' value='Create practice test'>
      <?php if (isset($_POST['test'])){ // if test button is pressed move user to test page
        header("Location: test.php", true, 301);
      }
         ?>
    </form>
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
  <?php echo "<p style='font-family: Arial, sans-serif; font-size: 16px; font-weight: bold; text-align: center;'>Welcome to the questionbank, " . $_SESSION['username'] . "!<br><br> </p>"; ?>

    <?php
    // retrive all units as 2D array
    $unitSql = 'SELECT * FROM unit';
    $unitResult = mysqli_query($conn, $unitSql);
    $unitArray = mysqli_fetch_all($unitResult, MYSQLI_ASSOC);
    ?>
    <!-- // print_r($unitArray); -->
    <!-- create form with method post -->
<form method="POST">
<div style="text-align: center;">
    <?php

        echo "Unit: <br> <select name='unit' id='unitidbruv' style='text-align: center;'>";

        echo "<option value='ALL'>ALL</option>";
        // foreach loop to create options for user to select units from database
        foreach ($unitArray as $unit) {
          echo "<option value='{$unit['UnitID']}'>{$unit['UnitName']}</option>";
        }
        echo "</select>";
        echo "<br> <br>Section: <br> <select name='section' id='sectionid' style='text-align: center;'>";
        echo "<option value='ALL'> ALL </option>";
        echo "<option value='A'> A </option>";
        echo "<option value='B'> B </option>";
        echo "</select>";

        echo "<br><br><input type='submit' id='searchQuestion' name='submit' value='Search Questionbank' style='text-align: center;'>";

?></div><?php


    // receiving value from options
    if (isset($_POST['submit'])) {
      $unit_=$_POST['unit'];
      $section=$_POST['section'];
      if($unit_=="ALL"){ // if all units are selected
      echo '<br><br><p style = "text-align: center"; > The selected unit is: ' . $unit_ . '<br>Selected Section: ' . $section . '</p>'; // display to the user the unit and section they chose
      echo "<hr>";
    }else { // if not all units are selected
      echo '<br><br>The selected unit is: ' . $unit_[0] . '.' . $unit_[1] . '<br>Selected Section: ' . $section; // output unitID with dot in between
      echo "<hr>";
    }
  }



?></form>
    <!-- questions -->
    <?php

  if($unit_!="" and $section !=""){ // if unit and section are not empty
    if ($unit_ == 'ALL' and $section == 'ALL') { // if unit and section are both set to all
      printQuestion($array); // print all questions from database
    }

    elseif ($unit_ == 'ALL' and $section != 'ALL'){ //if unit is set to all and section is not all, either A or B
        foreach ($array as $question) {
          if ($question['QuestionID'] != $questionID) { // condition to make sure no duplicates
            $finalQuestionResult = mysqli_query($conn, "SELECT * FROM question WHERE QuestionID='{$question['QuestionID']}' AND QuestionSection='{$section}'");
            $finalQuestionArray = mysqli_fetch_all($finalQuestionResult, MYSQLI_ASSOC);
            printQuestion($finalQuestionArray);
          }
          $questionID = $question['QuestionID'];
        }
    }elseif ($unit_ != 'ALL' and $section == 'ALL') { // if specific unit is selected and section is all
        $questionunitResult = mysqli_query($conn, "SELECT QuestionID FROM question_unit WHERE UnitID='{$unit_}'");
        $questionunitArray = mysqli_fetch_all($questionunitResult, MYSQLI_ASSOC);
        // print_r($questionunitArray);
        // fetch questions matching UnitID
        foreach ($questionunitArray as $question) {
          $finalQuestionResult = mysqli_query($conn, "SELECT * FROM question WHERE QuestionID='{$question['QuestionID']}'");
          $finalQuestionArray = mysqli_fetch_all($finalQuestionResult, MYSQLI_ASSOC);
          printQuestion($finalQuestionArray);
      }
  } else{ // if specific unit is selected and specific section is selected
      $questionunitResult = mysqli_query($conn, "SELECT QuestionID FROM question_unit WHERE UnitID='{$unit_}'");
      $questionunitArray = mysqli_fetch_all($questionunitResult, MYSQLI_ASSOC);
      // print_r($questionunitArray);
      // fetch questions matching UnitID
      foreach ($questionunitArray as $question) {
        $finalQuestionResult = mysqli_query($conn, "SELECT * FROM question WHERE QuestionID='{$question['QuestionID']}' AND QuestionSection='{$section}'");
        $finalQuestionArray = mysqli_fetch_all($finalQuestionResult, MYSQLI_ASSOC);
        printQuestion($finalQuestionArray);
      }
  }
}

     ?>
  </body>
</html>
<!-- <?php
echo "<marquee>";
 ?> -->
