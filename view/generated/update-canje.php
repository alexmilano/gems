
		<form action="crud.php" method="post">
			<input type="hidden" name="action" value="update" />
			<input type="hidden" name="view" value="update-canje" />
		<input type='hidden' name='id' value='<?php echo $vars["entity"]->id; ?>' />

<p><b>Premio Id</b></p>
	<input type='text' name='premio_id' value='<?php echo $vars["entity"]->premio_id; ?>' />

<p><b>Profile Id</b></p>
	<input type='text' name='profile_id' value='<?php echo $vars["entity"]->profile_id; ?>' />

<input type="submit" name="submit" value="Save" />
		</form>