
		<p><a class="agregarLink" href="controller.php?view=add-cheque">Agregar un nuevo registro</a></p>
		<p>Lista de cheque</p>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		    <tr>
		<td>nombre</td>
		<td>cheque</td>
			</tr>
			<?php foreach($vars["listcheque"] as $record) { ?>
			<tr>
				<td><?php echo $record->nombre; ?></td>
				<td><?php echo $record->cheque; ?></td>
				<td><a class="deleteLink" href="crud.php?action=delete&id=<?php echo $record->id; ?>"></a></td>
				<td><a class="editarLink" href="controller.php?view=update-cheque&idcheque=<?php echo $record->id; ?>"></a></td>
			</tr>
			<?php } ?>
		</table>