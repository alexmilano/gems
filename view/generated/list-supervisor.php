
		<p><a class="agregarLink" href="controller.php?view=add-profile">Agregar un nuevo registro</a></p>
		<p>Lista de profile</p>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		    <tr>
		<td>Codigo</td>
		<td>email</td>
		<td></td>
			</tr>
			<?php foreach($vars["listprofile"] as $record) { ?>
			<tr>
				
				<td><?php echo $record->id; ?></td>
				<td><?php echo $record->email; ?></td>
				<td><a class="editarLink" href="controller.php?view=show-profile&idprofile=<?php echo $record->id; ?>">Ver Detalle</a></td>
			</tr>
			<?php } ?>
		</table>