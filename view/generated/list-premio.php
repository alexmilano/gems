
		<p><a class="agregarLink" href="controller.php?view=add-premio">Agregar un nuevo registro</a></p>
		<p>Lista de premio</p>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		    <tr>
		<td>nombre</td>
		<td>puntos</td>
		<td>fecha_inicio</td>
		<td>fecha_fin</td>
		<td>tipo</td>
		<td>descripcion</td>
			</tr>
			<?php foreach($vars["listpremio"] as $record) { ?>
			<tr>
				<td><?php echo $record->nombre; ?></td>
				<td><?php echo $record->puntos; ?></td>
				<td><?php echo $record->fecha_inicio; ?></td>
				<td><?php echo $record->fecha_fin; ?></td>
				<td><?php echo $record->tipo; ?></td>
				<td><?php echo $record->descripcion; ?></td>
				<td><a class="deleteLink" href="crud.php?action=delete&id=<?php echo $record->id; ?>">Eliminar</a></td>
				<td><a class="editarLink" href="controller.php?view=update-premio&idpremio=<?php echo $record->id; ?>">Editar</a></td>
			</tr>
			<?php } ?>
		</table>