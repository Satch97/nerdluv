<?php include("top.html"); ?>


<?php
  $name = $_GET["name"];

  $err = FALSE;


  if (!preg_match("/\S/", $name)) { // non-empty
    $err = TRUE;
?>
    <h2>Error, empty name field</h2>

<?php
  }
?>
<?php include("bottom.html"); ?>
