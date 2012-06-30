
		<form action="crud.php" method="post">
			<input type="hidden" name="action" value="update" />
		<input type='hidden' name='id' value='<?php echo $vars["entity"]->id; ?>' />

<p><b>Email</b></p>
	<input type='text' name='email' value='<?php echo $vars["entity"]->email; ?>' />

<p><b>Password</b></p>
	<input type='text' name='password' value='<?php echo $vars["entity"]->password; ?>' />

<p><b>Location Id</b></p>
	<input type='text' name='location_id' value='<?php echo $vars["entity"]->location_id; ?>' />

<p><b>Role Id</b></p>
	<input type='text' name='role_id' value='<?php echo $vars["entity"]->role_id; ?>' />

<p><b>Status</b></p>
	<input type='text' name='status' value='<?php echo $vars["entity"]->status; ?>' />

<p><b>Validation Code</b></p>
	<input type='text' name='validation_code' value='<?php echo $vars["entity"]->validation_code; ?>' />

<input type="submit" name="submit" value="Save" />
		</form>