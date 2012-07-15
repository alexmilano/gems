
			<form action="crud.php" method="post">
				<input type="hidden" name="action" value="insert" />
				<input type="hidden" name="view" value="add-premio" />
			<input type='hidden' name='id' value='' />

<p><b>Nombre</b></p>
	<input type='text' name='nombre' value='' />

<p><b>Puntos</b></p>
	<input type='text' name='puntos' value='' />

<p><b>Fecha Inicio</b></p>
	<input type='text' name='fecha_inicio' value='' />

<p><b>Fecha Fin</b></p>
	<input type='text' name='fecha_fin' value='' />

<p><b>Tipo</b></p>
	<select name="tipo">
		<?php foreach($vars['tipos'] as $tipo){ ?> 
		<option value="<?php echo $tipo->id; ?>"><?php echo $tipo->nombre; ?></option>
		<?php } ?>
	</select>

<p><b>Descripcion</b></p>
	<input type='text' name='descripcion' value='' />

<input type="submit" name="submit" value="Save" />
			</form>