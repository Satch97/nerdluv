<?php include("top.html"); ?>

<div>
<form action="matches-submit.php" method="get">
	<div>
    <fieldset>
      <legend>Returning User:</legend>
      Name: <input type="text" name="name" maxlength="16" /> <br/>
      <input type="submit" value="View My Matches" />
    </fieldset>
  </div>
</form>
</div>

<?php include("bottom.html"); ?>
