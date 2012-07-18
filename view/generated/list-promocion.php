
		<p><a class="agregarLink" href="controller.php?view=add-promocion">Agregar un nuevo registro</a></p>
		<p>Lista de promocion</p>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		    <tr>
		<td>Descripcion</td>
		<td>Porcentaje</td>
		<td>Fecha de inicio</td>
		<td>Fecha de fin</td>
			</tr>
			<?php foreach($vars["listpromocion"] as $record) { ?>
			<tr>
				<td><?php echo $record->nombre; ?></td>
				<td><?php echo $record->porcentaje; ?></td>
				<td><?php echo $record->fecha_inicio; ?></td>
				<td><?php echo $record->fecha_fin; ?></td>
				<td><a class="deleteLink" href="crud.php?action=delete&id=<?php echo $record->id; ?>"></a></td>
				<td><a class="editarLink" href="controller.php?view=update-promocion&idpromocion=<?php echo $record->id; ?>"></a></td>
			</tr>
			<?php } ?>
		</table>