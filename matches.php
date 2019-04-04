<?php
	/*
	  File : matches.php
	  Purpose : a page with a form for existing users
							to log in and check their dating matches
	*/
?>

<?php include("top.html"); ?>

<div>
<form action="matches-submit.php" method="get">
	<div>
    <fieldset>
      <legend>Returning User:</legend>
			<ul>
				<li>
					<strong>Name:</strong><input type="text" name="name" maxlength="16" />
				</li>
			</ul>
      <input type="submit" value="View My Matches" />
    </fieldset>
  </div>
</form>
</div>

<?php include("bottom.html"); ?>
