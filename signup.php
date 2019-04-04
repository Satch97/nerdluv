<?php
	/*
		  File : signup.php
		  Purpose : A page with a form that the user
								can use to sign up for a new account
	*/
?>

<?php include("top.html"); ?>

<div>
<form action="signup-submit.php" method="post">
	<div>
		<fieldset>
			<legend>New User Signup</legend>
			<ul>
				<li>
					<strong>Name:</strong> <input type="text" name="name" maxlength="16" />
				</li>
				<li><strong>Gender:</strong><input type="radio" name="gen" value="M" /> Male
								<input type="radio" name="gen" value="F" checked="checked" /> Female</li>
				<li><strong>Age:</strong><input type="text" name="age" maxlength="2" /> </li>
				<li>
					<strong>Personality Type:</strong><input type="text" name="perstype" size="6" maxlength="4" />
					<a href = "http://www.humanmetrics.com/cgi-win/JTypes2.asp">(Don't know your type?)</a>
				</li>
				<li><strong>Favorite OS:</strong><select name="os">
						<option value = "1" selected="selected">Windows</option>
						<option value="2" >Mac OS X</option>
						<option value ="3" >Linux</option>
					</select>
				</li>
				<li>
					<strong>Seeking age:</strong>
												<input type="text" name="min" size="6" maxlength="2" placeholder="min"/>
												<input type="text" name="max" size="6" maxlength="2" placeholder="max"/>
				</li>
			</ul>
			<input type="submit" value ="Sign Up" />
		</fieldset>
  </div>
</form>
</div>

<?php include("bottom.html"); ?>
