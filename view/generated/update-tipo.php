
		<form action="crud.php" method="post">
			<input type="hidden" name="action" value="update" />
			<input type="hidden" name="view" value="update-tipo" />
		<input type='hidden' name='id' value='<?php echo $vars["entity"]->id; ?>' />

<p><b>Nombre</b></p>
	<input type='text' name='nombre' value='<?php echo $vars["entity"]->nombre; ?>' />
<p><b>Valor minimo ($)</b></p>
	<input type='text' name='minimo' value='<?php echo $vars["entity"]->minimo; ?>' />
<p><b>Valor maximo ($)</b></p>
	<input type='text' name='maximo' value='<?php echo $vars["entity"]->maximo; ?>' />

<input type="submit" name="submit" value="Save" />
		</form>