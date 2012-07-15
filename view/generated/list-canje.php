		<a class="agregarLink" href="controller.php?view=list-canje&status=Pendiente"> Pendientes </a> 
		<a class="agregarLink" href="controller.php?view=list-canje&status=Aceptado"> Aceptados </a> 
		<a class="agregarLink" href="controller.php?view=list-canje&status=Rechazado"> Rechazados </a>
		<p><a class="agregarLink" href="controller.php?view=add-canje">Agregar un nuevo registro</a></p>
		
		<p>Lista de canje</p>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		    <tr>
		<td>Codigo de socio</td>
		<td>Nombre de Socio</td>
		<td>Puntos Disponibles</td>
		<td>Nombre de premio</td>
		<td>Descripcion</td>
		<td>Status</td>
		<td>Puntos</td>
			</tr>
			<?php foreach($vars["listcanje"] as $record) { ?>
			<tr>
				<td><?php echo $record["socio"]; ?></td>
				<td><?php echo $record["nombre_socio"]; ?></td>
				<td><?php echo $record["puntos_disponibles"]; ?></td>
				<td><?php echo $record["nombre"]; ?></td>
				<td><?php echo $record["descripcion"]; ?></td>
				<td><?php echo $record["status"]; ?></td>
				<td><?php echo $record["puntos"]; ?></td>
				<?php if ($record["status"] == "Pendiente"){  ?>
				<td><a class="editarLink" href="crud.php?view=list-canje&action=ProcesarCanje&status=Aceptado&idcanje=<?php echo $record["id"]; ?>">Aceptar</a></td>
				<td><a class="editarLink" href="crud.php?view=list-canje&action=ProcesarCanje&status=Rechazado&idcanje=<?php echo $record["id"]; ?>">Rechazar</a></td>
				<?php } ?>
			</tr>
			<?php } ?>
		</table>