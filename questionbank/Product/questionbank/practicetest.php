<?php
session_start(); // start session to save information from user test.php form

if(empty($_SESSION)){
  header("Location: index.php");
}

$conn = mysqli_connect("localhost","hashem","","questionbank"); // establish connection with database
$questionID = 0; // define questionID
$questions = array(); // define questions array
$test = array(); // define test questions array
$testtime = 0; // define variable with test time
function printQuestion($array) // same printQuestion function from firstpage.php without the markscheme
{
  foreach ($array as $key) {
    $conn = mysqli_connect("localhost","hashem","","questionbank");
    $COUNTER = 0;
    echo "<p>Section <b>{$key['QuestionSection']}</b></p>";

    // select unit matching // question
    // print_r($key);

    $sql = "SELECT UnitID FROM question_unit WHERE QuestionID = '{$key['QuestionID']}'";

    $result = mysqli_query($conn, $sql);

    $unitarray = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $unitArraySize = count($unitarray);

    $counterTwo = 0;

    echo "<p>Unit(s): <b>";

    foreach ($unitarray as $unitkey) {
      echo "{$unitkey['UnitID'][0]}" . "." . "{$unitkey['UnitID'][1]}";
      $counterTwo = $counterTwo + 1;
      if ($counterTwo < $unitArraySize) {
        echo ", ";
      }
    }

    echo "</b></p>";
// end of selecting and outputting unit
    echo "<p>Title: <b>{$key['QuestionName']}</b></p>";
    $questionArray = (explode(',',$key['QuestionSrc']));
    foreach ($questionArray as $question) {
      echo "<img src='{$question}' height='20%' width='40%'><br>";
    }
    // foreach ($markschemeArray as $markscheme) {
    //   $COUNTER = $COUNTER + 1;
    //   echo "<br><a href='{$markscheme}'>Markscheme</a>" . "(" . $COUNTER . ")";
    // }

    echo "<br><br><hr>";
  }

}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Practice test</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <style>
  body{
    font-family: Arial, sans-serif;
    background-color: white;
    text-align: center;
  }
  .container{
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    background-color: white;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.3);
  }
  h1{
    text-align: center;
    font-size: 36px;
    margin-bottom: 20px;
  }
  p{
    font-size: 18px;
    margin-bottom: 10px;
  }
  img{
    display: block;
    margin: 20px auto;
  }
  hr{
    border: 1px solid gray;
    margin: 20px 0;
  }
</style>

  </head>
  <body>
    <?php
    if (isset($_POST['submit'])) { // if start test button is pressed continue
      if(isset($_POST['units'])){ // if specific units are selected continue
      foreach ($_POST['units'] as $unit) { // select each unit chosen individually
        $questionunitResult = mysqli_query($conn, "SELECT QuestionID FROM question_unit WHERE UnitID='{$unit}'"); // select questionID that matches unit
        $questionunitArray = mysqli_fetch_all($questionunitResult, MYSQLI_ASSOC);

        foreach ($questionunitArray as $question) { // take every individual question matching unit
          if ($question['QuestionID'] != $questionID) {
            $finalQuestionResult = mysqli_query($conn, "SELECT * FROM question WHERE QuestionID='{$question['QuestionID']}'");
            $finalQuestionArray = mysqli_fetch_all($finalQuestionResult, MYSQLI_ASSOC);
            array_push($questions, $finalQuestionArray[0]); // push questions into $questions array
          }
          $questionID = $question['QuestionID']; // prevent duplication of questions
        }
      }
        $selectedQuestionsArray =  array_map("unserialize", array_unique(array_map("serialize", $questions))); // make sure duplicates are removed
        // echo "<pre>";
        // print_r($selectedQuestionsArray);

        if (isset($_POST['testtime'])) { // if test time is chosen by user loop until number of questions minutes match test time then print array

          while ($testtime <= $_POST['testtime']) {
            if(!empty($selectedQuestionsArray)){
              $key = array_rand($selectedQuestionsArray);
              $testtime += $selectedQuestionsArray[$key]['time'];
              array_push($test, $selectedQuestionsArray[$key]);
              unset($selectedQuestionsArray[$key]);
          }else{
            break;
          }
        }


        for($i=0; $i<count($test); $i++) {
          $min_idx = $i;

          for($j=$i+1; $j<count($test); $j++) {
            if($test[$j]['time'] < $test[$min_idx]['time']){
              $min_idx = $j;
            }

          }
          $temp1 = $test[$min_idx];
          $test[$min_idx] = $test[$i];
          $test[$i] = $temp1;

        }

        printQuestion($test);




        ?>
        <form action="recent.php" method="post">
          <input type="submit" name="end" value="END PRACTICE TEST">
          <?php
           $_SESSION['doneTest'] = $test; // save completed test in session variable
           ?>
        </form>
        <?php
      }
    }else{ // if no units are selected, redirect user test page
        echo "Please select at least 1 unit to start your exam! You will be redirected in 3 seconds.";
        header("refresh:3;url=test.php");
      }

    }
       ?>

  </body>
</html>
