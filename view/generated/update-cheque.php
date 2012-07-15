
		<form action="crud.php" method="post">
			<input type="hidden" name="action" value="update" />
			<input type="hidden" name="view" value="update-cheque" />
		<input type='hidden' name='id' value='<?php echo $vars["entity"]->id; ?>' />

<p><b>Nombre</b></p>
	<input type='text' name='nombre' value='<?php echo $vars["entity"]->nombre; ?>' />

<p><b>Cheque</b></p>
	<input type='text' name='cheque' value='<?php echo $vars["entity"]->cheque; ?>' />

<input type="submit" name="submit" value="Save" />
		</form>