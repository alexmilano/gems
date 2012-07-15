	<a class="agregarLink" href="controller.php?view=mis-canjes&status=Pendiente"> Pendientes </a> 
		<a class="agregarLink" href="controller.php?view=mis-canjes&status=Aceptado"> Aceptados </a> 
		<a class="agregarLink" href="controller.php?view=mis-canjes&status=Rechazado"> Rechazados </a>
		<p><a class="agregarLink" href="controller.php?view=canjear">Canjear otro premio</a></p>
		<p>Lista de canje</p>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		    <tr>
		<td>id</td>
		<td>Nombre de premio</td>
		<td>Descripcion</td>
		<td>Puntos</td>
			</tr>
			<?php foreach($vars["listcanje"] as $record) { ?>
			<tr>
				<td><?php echo $record["nombre"]; ?></td>
				<td><?php echo $record["descripcion"]; ?></td>
				<td><?php echo $record["status"]; ?></td>
				<td><?php echo $record["puntos"]; ?></td>
				
			</tr>
			<?php } ?>
		</table>