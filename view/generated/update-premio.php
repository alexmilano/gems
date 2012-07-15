
		<form action="crud.php" method="post">
			<input type="hidden" name="action" value="update" />
			<input type="hidden" name="view" value="update-premio" />
		<input type='hidden' name='id' value='<?php echo $vars["entity"]->id; ?>' />

<p><b>Nombre</b></p>
	<input type='text' name='nombre' value='<?php echo $vars["entity"]->nombre; ?>' />

<p><b>Puntos</b></p>
	<input type='text' name='puntos' value='<?php echo $vars["entity"]->puntos; ?>' />

<p><b>Fecha Inicio</b></p>
	<input type='text' name='fecha_inicio' value='<?php echo $vars["entity"]->fecha_inicio; ?>' />

<p><b>Fecha Fin</b></p>
	<input type='text' name='fecha_fin' value='<?php echo $vars["entity"]->fecha_fin; ?>' />

<p><b>Tipo</b></p>
	<input type='text' name='tipo' value='<?php echo $vars["entity"]->tipo; ?>' />

<p><b>Descripcion</b></p>
	<input type='text' name='descripcion' value='<?php echo $vars["entity"]->descripcion; ?>' />

<input type="submit" name="submit" value="Save" />
		</form>