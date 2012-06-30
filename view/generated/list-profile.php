
		<p><a class="agregarLink" href="controller.php?view=add-profile">Agregar un nuevo registro</a></p>
		<p>Lista de profile</p>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		    <tr>
		<td>id</td>
		<td>socio</td>
		<td>nombre</td>
		<td>fecha_nacimiento</td>
		<td>empresa</td>
		<td>cargo</td>
		<td>telefono</td>
		<td>celular</td>
		<td>fax</td>
		<td>email</td>
		<td>direccion</td>
		<td>estado_civil</td>
		<td>hijos</td>
		<td>hijos_menor_12</td>
		<td>hijos_13_18</td>
		<td>hijos_19_mas</td>
		<td>gustos_generales</td>
		<td>gustos_pasatiempos</td>
		<td>gustos_musica</td>
		<td>cantante_favorito</td>
		<td>gustos_comida</td>
		<td>gustos_bebida</td>
		<td>gustos_deportes</td>
		<td>recibo_estado_cuenta</td>
		<td>supervisor</td>
		<td>fecha_inscripcion</td>
		<td>user_id</td>
			</tr>
			<?php foreach($vars["listprofile"] as $record) { ?>
			<tr>
				<td><?php echo $record->id; ?></td>
				<td><?php echo $record->socio; ?></td>
				<td><?php echo $record->nombre; ?></td>
				<td><?php echo $record->fecha_nacimiento; ?></td>
				<td><?php echo $record->empresa; ?></td>
				<td><?php echo $record->cargo; ?></td>
				<td><?php echo $record->telefono; ?></td>
				<td><?php echo $record->celular; ?></td>
				<td><?php echo $record->fax; ?></td>
				<td><?php echo $record->email; ?></td>
				<td><?php echo $record->direccion; ?></td>
				<td><?php echo $record->estado_civil; ?></td>
				<td><?php echo $record->hijos; ?></td>
				<td><?php echo $record->hijos_menor_12; ?></td>
				<td><?php echo $record->hijos_13_18; ?></td>
				<td><?php echo $record->hijos_19_mas; ?></td>
				<td><?php echo $record->gustos_generales; ?></td>
				<td><?php echo $record->gustos_pasatiempos; ?></td>
				<td><?php echo $record->gustos_musica; ?></td>
				<td><?php echo $record->cantante_favorito; ?></td>
				<td><?php echo $record->gustos_comida; ?></td>
				<td><?php echo $record->gustos_bebida; ?></td>
				<td><?php echo $record->gustos_deportes; ?></td>
				<td><?php echo $record->recibo_estado_cuenta; ?></td>
				<td><?php echo $record->supervisor; ?></td>
				<td><?php echo $record->fecha_inscripcion; ?></td>
				<td><?php echo $record->user_id; ?></td>
				<td><a class="deleteLink" href="crud.php?action=delete&id=<?php echo $record->id; ?>"></a></td>
				<td><a class="editarLink" href="controller.php?view=update-profile&idprofile=<?php echo $record->id; ?>"></a></td>
			</tr>
			<?php } ?>
		</table>