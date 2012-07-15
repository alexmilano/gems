
		<p><a class="agregarLink" href="controller.php?view=nuevo-registro">Agregar un nuevo registro</a></p>
		<p>Lista de venta</p>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		    <tr>
		<td>room</td>
		<td>guest_name</td>
		<td>arrival</td>
		<td>departure</td>
		<td>number_of_night</td>
		<td>adults</td>
		<td>rate_code</td>
		<td>rate_ammount</td>
		<td>rate_revenue</td>
		<td>confirmation</td>
		<td>code_socio</td>
			</tr>
			<?php foreach($vars["listventa"] as $record) { ?>
			<tr>
				<td><?php echo $record->room; ?></td>
				<td><?php echo $record->guest_name; ?></td>
				<td><?php echo $record->arrival; ?></td>
				<td><?php echo $record->departure; ?></td>
				<td><?php echo $record->number_of_night; ?></td>
				<td><?php echo $record->adults; ?></td>
				<td><?php echo $record->rate_code; ?></td>
				<td><?php echo $record->rate_ammount; ?></td>
				<td><?php echo $record->rate_revenue; ?></td>
				<td><?php echo $record->confirmation; ?></td>
				<td><?php echo $record->code_socio; ?></td>
				<td><a class="deleteLink" href="crud.php?action=delete&id=<?php echo $record->id; ?>"></a></td>
				<td><a class="editarLink" href="controller.php?view=update-venta&idventa=<?php echo $record->id; ?>"></a></td>
			</tr>
			<?php } ?>
		</table>