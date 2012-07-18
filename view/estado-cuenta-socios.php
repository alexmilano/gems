<h1>Estado de cuenta de socios</h1>
<br/>
<form action="crud.php" method="post">
<p><b>Codigo:</b></p>
	<input type="hidden" name="action" value="Buscar" />
	<input type="hidden" name="view" value="busqueda" />
	<input type='text' name='codigo' value='' />
	<input type="submit" name="submit" value="Buscar" />
</form>
<a href="estados-de-cuenta">Ver Todos</a>
<br/>
<?php 
$monto_total = 0.0;
$aux = ""; 
$i=0;
foreach($vars["listventa"] as $record) {
	if ($record['socio'] != $aux){ 
		if ($i !=0){?>
		</table>
		<p><span> Puntos Acumulados: <?php echo $monto_total; ?></span> </p>
		<hr/>
		<?php $monto_total = 0.0;} ?>
		<p><span> Socio(a): <?php echo $record['socio']; ?> <?php echo $record['nombre']; ?></span> </p>
		<p><span> Empresa: <?php echo $record['empresa']; ?></span> </p>
		<p><span> Telefono: <?php echo $record['telefono']; ?></span> </p>
		<p><span> Celular: <?php echo $record['celular']; ?></span> </p>
		<p><span> Fax: <?php echo $record['fax']; ?></span> </p>
		<p><span> Email: <?php echo $record['email']; ?></span> </p>
		<p><span> Cumpleanos: <?php echo $record['fecha_nacimiento']; ?></span> </p>

		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		    <tr>
				<td>Nombre</td>
				<td>Llegada</td>
				<td>Salida</td>
				<td>Total de Puntos</td>
	
			</tr>
	<?php } ?>
	
		<tr>
			<td><?php echo $record['guest_name']; ?></td>
			<td><?php echo $record['arrival']; ?></td>
			<td><?php echo $record['departure']; ?></td>
			<td><?php echo $record['rate_revenue']; ?></td>
		</tr>

<?php $aux = $record['socio']; $i++; $monto_total = $monto_total + $record['rate_revenue'];} ?>
	</table>
	<p><span> Puntos Acumulados: <?php echo $monto_total; ?></span> </p>
	
		