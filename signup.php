<?php include("top.html"); ?>

<div>
<form action="signup-submit.php" method="post">
	<div>
		Name: <input type="text" name="name" maxlength="16" /> <br/>
		Gender: <input type="radio" name="gen" value="male" /> Male
						<input type="radio" name="gen" value="male" checked="checked" /> Female <br/>
		Age: <input type="text" name="age" maxlength="6" /> <br/>
		Personality Type: <input type="text" size="6" maxlength="4" />
			<a href = "http://www.humanmetrics.com/cgi-win/JTypes2.asp">(Don't know your type?)</a> <br/>
			<select name="favoriteos">
				<option selected="selected">Windows</option>
				<option>Mac OS X</option>
				<option >Linux</option>
			</select> <br/>
		Seeking age:  <input type="text" name="min" size="6" maxlength="2" placeholder="min"/>
									<input type="text" name="max" size="6" maxlength="2" placeholder="max"/>
									<br/>
		<input type="submit" />
  </div>
</form>
</div>

<?php include("bottom.html"); ?>
