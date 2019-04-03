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



?>


<?php include("bottom.html"); ?>
