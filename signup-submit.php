<?php include("top.html"); ?>


<?php
  $name = $_POST["name"];
  $gen = $_POST["gen"];
  $age =$_POST["age"];
  $pers = $_POST["perstype"];
  $os = $_POST["os"];
  $min = $_POST["min"];
  $max = $_POST["max"];

  $err = FALSE;


  if (!preg_match("/\S/", $name)) { // non-empty
    $err = TRUE;
?>
    <h2>Error, empty name field,
      <a href = "http://www.humanmetrics.com/cgi-win/JTypes2.asp">Guide</a>
    </h2>

<?php
  }

  if (!preg_match("/^\d{1,2}$/", $age)) {
    $err = TRUE;
?>
    <h2>Error, invalid age field</h2>
<?php
  }

  if (!preg_match("/^F|M$/", $gen)) {
    $err = TRUE;
?>
    <h2>Suspicious submission</h2>
<?php
  }


  if (!preg_match("/^[IiEe][NnSs][FfTf][JjPp]$/", $pers)) {
    $err = TRUE;
?>
  <h2>Error, invalid Personality Type Submitted.</h2>
<?php
  }

  if (!preg_match("/^[0-2]$/", $os)) {
    $err = TRUE;
?>
  <h2>Error, invalid Personality Type Submitted.</h2>
<?php
  }

  if (!preg_match("/^\d{1,2}$/", $min)) {
    $err = TRUE;
?>
  <h2>Error, invalid min field</h2>
<?php
  }

  if (!preg_match("/^\d{1,2}$/", $max)) {
    $err = TRUE;
?>
  <h2>Error, invalid max field</h2>
<?php
  }

  if ($max < $min) {
    $err = TRUE;
?>
  <h2>Error, max age cannot be less than min age</h2>
<?php
  }

  if(!$err) {
?>
  <div><strong>Thank You!</strong></div><br>
  <div>Welcome to Nerdluv, <?= $name ?></div><br>
  <div> Now
    <a href="matches.php">
			login to see your matches!
	   </a>
  </div>
<?php
  }


?>


<?php include("bottom.html"); ?>
