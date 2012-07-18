		<a class="btn" href="controller.php?view=list-canje&status=Pendiente"> Pendientes </a> 
		<a class="btn" href="controller.php?view=list-canje&status=Aceptado"> Aceptados </a> 
		<a class="btn" href="controller.php?view=list-canje&status=Rechazado"> Rechazados </a>
		
		<p>Lista de canje</p>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		    <tr>
		<td>Codigo de socio</td>
		<td>Nombre de Socio</td>
		<td>Produccion</td>
		<td>Empresa</td>
		<?php if ($_GET['status'] == "Pendiente"){ ?>
			<td>Puntos Disponibles</td>
		<?php } ?>
		<td>Nombre de premio</td>
		<td>Descripcion</td>
		<td>Status</td>
		<td>Costo del premio</td>
		
		<td>cheque</td>
			</tr>
			<?php foreach($vars["listcanje"] as $record) { ?>
			<tr>
				<td><?php echo $record["socio"]; ?></td>
				<td><?php echo $record["nombre_socio"]; ?></td>
				<td><?php echo $record["revenue_total"]; ?></td>
				<td><?php echo $record["empresa"]; ?></td>
				<?php if ($_GET['status'] == "Pendiente"){ ?>
					<td><?php echo $record["puntos_disponibles"]; ?></td>
				<?php } ?>
				<td><?php echo $record["nombre"]; ?></td>
				<td><?php echo $record["descripcion"]; ?></td>
				<td><?php echo $record["status"]; ?></td>
				<td><?php echo $record["puntos"]; ?></td>
				
				<?php if ($record["status"] == "Pendiente"){  ?>
				<form action="crud.php" method="post">
					<input type="hidden" name="action" value="ProcesarCanje" />
					<input type="hidden" name="view" value="list-canje" />
					<input type="hidden" name="status" value="Aceptado"/>
					<input type="hidden" name="idcanje" value="<?php echo $record["id"]; ?>" />
				<td><select name="cheque">
					<?php foreach($vars["cheques"] as $cheque) { ?>
						<option value = "<?php echo $cheque->id;?>"><?php echo $cheque->cheque;?></option>
					<?php } ?>
				</select></td>
				<td><input type="submit" value="Aceptar" /></td>
				</form>
				<td><a class="editarLink" href="crud.php?view=list-canje&action=ProcesarCanje&status=Rechazado&idcanje=<?php echo $record["id"]; ?>">Rechazar</a></td>
				<?php }else{ ?>
				<td><?php echo $record["nombre_cheque"]; ?></td>
				<?php } ?>
			</tr>
			<?php } ?>
		</table>