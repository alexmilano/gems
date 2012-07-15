
		<p><a class="agregarLink" href="controller.php?view=add-tipo">Agregar un nuevo registro</a></p>
		<p>Lista de tipo</p>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		    <tr>
		<td>nombre</td>
		<td>minimo</td>
		<td>maximo</td>
		<td></td>
		<td></td>
			</tr>
			<?php foreach($vars["listtipo"] as $record) { ?>
			<tr>
				<td><?php echo $record->nombre; ?></td>
				<td><?php echo $record->minimo; ?></td>
				<td><?php echo $record->maximo; ?></td>
				<td><a class="deleteLink" href="crud.php?action=delete&id=<?php echo $record->id; ?>">Eliminar</a></td>
				<td><a class="editarLink" href="controller.php?view=update-tipo&idtipo=<?php echo $record->id; ?>">Editar</a></td>
			</tr>
			<?php } ?>
		</table>