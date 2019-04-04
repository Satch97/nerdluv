<?php
  /*
    File : signup-submit.php
    Purpose : The page that receives data submitted by
              signup.php and signs up the new user
  */
?>

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
    <h2>Error, empty name field.</h2>

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
  <h2>Error, invalid Personality Type Submitted.
    <a href = "http://www.humanmetrics.com/cgi-win/JTypes2.asp">Guide</a>
  </h2>

<?php
  }

  if (!preg_match("/^[1-3]$/", $os)) {
    $err = TRUE;
?>
  <h2>Suspicious submission</h2>
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
    try {
      $db = new PDO('mysql:dbname=nerdluv;host=localhost', 'nerd', 'Nerdluv');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $orig_name = $name;
      $name = $db->quote($name);
      $gen = $db->quote($gen);
      $pers = $db->quote($pers);

      $db->exec("INSERT INTO userinfo VALUES(NULL, $name, $gen, $age);");
      $db->exec("INSERT INTO userpersonality VALUES(LAST_INSERT_ID(),$pers);");
      $db->exec("INSERT INTO useros VALUES(LAST_INSERT_ID(),$os);");
      $db->exec("INSERT INTO useragerange VALUES(LAST_INSERT_ID() , $min, $max);");

    } catch (PDOException $ex) {

    ?>
      <p>Sorry, a database error occurred. Please try again later.</p> <p>(Error details: <?= $ex->getMessage() ?>)</p>
      <?php
    }

?>
  <div><strong>Thank You!</strong></div><br>
  <div>Welcome to Nerdluv, <?= $orig_name ?></div><br>
  <div> Now
    <a href="matches.php">
			login to see your matches!
	   </a>
  </div>
<?php
  }


?>


<?php include("bottom.html"); ?>
