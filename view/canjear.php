<?php echo $_SESSION['user']->tipo; ?>
		<p>Usted puede canjear cualquiera de estos premios</p>
		<p>Lista de premio</p>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		    <tr>
		<td>nombre</td>
		<td>descripcion</td>
		<td>puntos</td>
			</tr>
			<?php foreach($vars["listpremio"] as $record) { ?>
			<tr>
				<td><?php echo $record->nombre; ?></td>
				<td><?php echo $record->descripcion; ?></td>
				<td><?php echo $record->puntos; ?></td>
				<td><a class="editarLink" href="crud.php?view=canjear&action=Canjear&idpremio=<?php echo $record->id; ?>">Canjear</a></td>
			</tr>
			<?php } ?>
		</table>