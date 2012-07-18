
			<form action="crud.php" method="post">
				<input type="hidden" name="action" value="insert" />
				<input type="hidden" name="view" value="add-promocion" />
			<input type='hidden' name='id' value='' />

<p><b>Descripcion</b></p>
	<input type='text' name='nombre' value='' />

<p><b>Porcentaje</b></p>
	<input type='text' name='porcentaje' value='' />

<p><b>Fecha Inicio</b></p>
	<input type='text' name='fecha_inicio' value='' />

<p><b>Fecha Fin</b></p>
	<input type='text' name='fecha_fin' value='' />

<input type="submit" name="submit" value="Save" />
			</form>