
		<form action="crud.php" method="post">
			<input type="hidden" name="action" value="update" />
		<input type='hidden' name='id' value='<?php echo $vars["entity"]->id; ?>' />

<p><b>Nombre</b></p>
	<input type='text' name='nombre' value='<?php echo $vars["entity"]->nombre; ?>' />

<p><b>Porcentaje</b></p>
	<input type='text' name='porcentaje' value='<?php echo $vars["entity"]->porcentaje; ?>' />

<p><b>Fecha Inicio</b></p>
	<input type='text' name='fecha_inicio' value='<?php echo $vars["entity"]->fecha_inicio; ?>' />

<p><b>Fecha Fin</b></p>
	<input type='text' name='fecha_fin' value='<?php echo $vars["entity"]->fecha_fin; ?>' />

<input type="submit" name="submit" value="Save" />
		</form>