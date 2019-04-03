<?php include("top.html"); ?>

<?php
  $name = $_GET["name"];

  $err = FALSE;

  if (!preg_match("/\S/", $name)) { // non-empty
    $err = TRUE;
?>
    <h2>Error, empty name field</h2>

<?php
} else {
?>
         <h2>Matches for <?= $name?></h2>
<?php
}

  try {
    $db = new PDO('mysql:dbname=nerdluv;host=localhost', 'nerd', 'Nerdluv');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // search for user
    $name = $db->quote($name);
    $users = $db->query("SELECT i.name, i.gender, i.age, p.u_pers, o.os_id, a.min, a.max
               FROM userinfo i
               JOIN userpersonality p ON i.u_id = p.u_id
               JOIN useros o ON i.u_id = o.u_id
               JOIN useragerange a ON i.u_id = a.u_id
               WHERE i.name = $name;");
    if (count($users) < 1) {
?>
       <h2>Error, your user information is not found, try signing up</h2>
<?php
    } else {
       $curruser = $users->fetch(PDO::FETCH_ASSOC); // assume only one, not handling duplicates
       $os_id = $curruser['os_id'];
       $min = $curruser['min'];
       $max = $curruser['max'];
       $gen = $curruser['gender'];
       $gen = $db->quote($gen);
       $rows = $db->query("SELECT i.name, i.gender, p.u_pers, i.age, oo.os_name, a.min, a.max
                                FROM userinfo i
                                JOIN userpersonality p ON i.u_id = p.u_id
                                JOIN useros o ON i.u_id = o.u_id
                                JOIN os oo ON oo.os_id = o.os_id
                                JOIN useragerange a ON i.u_id = a.u_id
                                WHERE o.os_id = $os_id
                                AND i.gender <> $gen
                                AND i.age >= $min
                                AND i.age <= $max;");

        foreach($rows as $row) {
        $flag = FALSE;
        $currpers = str_split($row["u_pers"]);
        $rowpers = $arr1 = str_split($curruser["u_pers"]);
        for ($i = 0; $i < sizeof($rowpers); $i++){
          if($currpers[$i] == $rowpers[$i]) {
            $flag = TRUE;
          }
        }

        if($flag) {
?>
           <div class='match'>
            <p><img src='user.jpg' ><?= $row["name"]?></p>
            <ul>
                <li><strong>gender:</strong><?= $row["gender"]?></li>
                <li><strong>age:</strong><?= $row["age"]?></li>
                <li><strong>type:</strong><?= $row["u_pers"]?></li>
                <li><strong>OS:</strong><?= $row["os_name"]?></li>
            </ul>
           </div>
<?php
          }

      }
    }
  } catch (PDOException $ex) {
?>
    <p>Sorry, a database error occurred. Please try again later.</p> <p>(Error details: <?= $ex->getMessage() ?>)</p>
    <?php
}

?>
<?php include("bottom.html"); ?>
