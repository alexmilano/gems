
		<p><a class="agregarLink" href="controller.php?view=add-profile">Agregar un nuevo registro</a></p>
		<p>Lista de profile</p>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		    <tr>
		<td>Codigo</td>
		<td>Nombre</td>
		<td>telefono</td>
		<td>email</td>
		<td>cumpleanos</td>
		<td></td>
			</tr>
			<?php foreach($vars["listprofile"] as $record) { ?>
			<tr>
				
				<td><?php echo $record->socio; ?></td>
				<td><?php echo $record->nombre; ?></td>
				<td><?php echo $record->telefono; ?></td>
				<td><?php echo $record->email; ?></td>
				<td><?php echo date('d-m',strtotime(preg_replace('#/#','-',$record->fecha_nacimiento)));  ?></td>
				</tr>
			<?php } ?>
		</table>