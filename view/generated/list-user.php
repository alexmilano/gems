
		<p><a class="agregarLink" href="controller.php?view=add-user">Agregar un nuevo registro</a></p>
		<p>Lista de user</p>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		    <tr>
		<td>email</td>
		<td>password</td>
		<td>location_id</td>
		<td>role_id</td>
		<td>status</td>
		<td>validation_code</td>
			</tr>
			<?php foreach($vars["listuser"] as $record) { ?>
			<tr>
				<td><?php echo $record->email; ?></td>
				<td><?php echo $record->password; ?></td>
				<td><?php echo $record->location_id; ?></td>
				<td><?php echo $record->role_id; ?></td>
				<td><?php echo $record->status; ?></td>
				<td><?php echo $record->validation_code; ?></td>
				<td><a class="deleteLink" href="crud.php?action=delete&id=<?php echo $record->id; ?>"></a></td>
				<td><a class="editarLink" href="controller.php?view=update-user&iduser=<?php echo $record->id; ?>"></a></td>
			</tr>
			<?php } ?>
		</table>