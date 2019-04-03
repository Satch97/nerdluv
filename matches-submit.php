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




  try {
    $db = new PDO('mysql:dbname=nerdluv;host=localhost', 'nerd', 'Nerdluv');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $rows = $db->query("SELECT i.name, i.gender, p.u_pers, i.age, oo.os_name, a.min, a.max
                FROM userinfo i
                JOIN userpersonality p ON i.u_id = p.u_id
                JOIN useros o ON i.u_id = o.u_id
                JOIN os oo ON oo.os_id = o.os_id
                JOIN useragerange a ON i.u_id = a.u_id;");
  } catch (PDOException $ex) {
?>
    <p>Sorry, a database error occurred. Please try again later.</p> <p>(Error details: <?= $ex->getMessage() ?>)</p>
    <?php
}



?>
<?php include("bottom.html"); ?>
