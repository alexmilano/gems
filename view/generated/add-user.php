
			<form action="crud.php" method="post">
				<input type="hidden" name="action" value="insert" />
				<input type="hidden" name="view" value="add-user" />
			<input type='hidden' name='id' value='' />

<p><b>Email</b></p>
	<input type='text' name='email' value='' />

<p><b>Password</b></p>
	<input type='text' name='password' value='' />

<p><b>Location Id</b></p>
	<input type='text' name='location_id' value='' />

<p><b>Role Id</b></p>
	<input type='text' name='role_id' value='' />

<p><b>Status</b></p>
	<input type='text' name='status' value='' />

<p><b>Validation Code</b></p>
	<input type='text' name='validation_code' value='' />

<input type="submit" name="submit" value="Save" />
			</form>