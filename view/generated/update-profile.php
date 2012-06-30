
		<form action="crud.php" method="post">
			<input type="hidden" name="action" value="update" />
		<input type='hidden' name='id' value='<?php echo $vars["entity"]->id; ?>' />

<p><b>Socio</b></p>
	<input type='text' name='socio' value='<?php echo $vars["entity"]->socio; ?>' />

<p><b>Nombre</b></p>
	<input type='text' name='nombre' value='<?php echo $vars["entity"]->nombre; ?>' />

<p><b>Empresa</b></p>
	<input type='text' name='empresa' value='<?php echo $vars["entity"]->empresa; ?>' />

<p><b>Cargo</b></p>
	<input type='text' name='cargo' value='<?php echo $vars["entity"]->cargo; ?>' />

<p><b>Telefono</b></p>
	<input type='text' name='telefono' value='<?php echo $vars["entity"]->telefono; ?>' />

<p><b>Celular</b></p>
	<input type='text' name='celular' value='<?php echo $vars["entity"]->celular; ?>' />

<p><b>Fax</b></p>
	<input type='text' name='fax' value='<?php echo $vars["entity"]->fax; ?>' />

<p><b>Email</b></p>
	<input type='text' name='email' value='<?php echo $vars["entity"]->email; ?>' />

<p><b>Direccion</b></p>
	<input type='text' name='direccion' value='<?php echo $vars["entity"]->direccion; ?>' />

<p><b>Estado Civil</b></p>
	<input type='text' name='estado_civil' value='<?php echo $vars["entity"]->estado_civil; ?>' />

<p><b>Hijos</b></p>
	<input type='text' name='hijos' value='<?php echo $vars["entity"]->hijos; ?>' />

<p><b>Hijos Menor 12</b></p>
	<input type='text' name='hijos_menor_12' value='<?php echo $vars["entity"]->hijos_menor_12; ?>' />

<p><b>Hijos 13 18</b></p>
	<input type='text' name='hijos_13_18' value='<?php echo $vars["entity"]->hijos_13_18; ?>' />

<p><b>Hijos 19 Mas</b></p>
	<input type='text' name='hijos_19_mas' value='<?php echo $vars["entity"]->hijos_19_mas; ?>' />

<p><b>Gustos Generales</b></p>
	<input type='text' name='gustos_generales' value='<?php echo $vars["entity"]->gustos_generales; ?>' />

<p><b>Gustos Pasatiempos</b></p>
	<input type='text' name='gustos_pasatiempos' value='<?php echo $vars["entity"]->gustos_pasatiempos; ?>' />

<p><b>Gustos Musica</b></p>
	<input type='text' name='gustos_musica' value='<?php echo $vars["entity"]->gustos_musica; ?>' />

<p><b>Cantante Favorito</b></p>
	<input type='text' name='cantante_favorito' value='<?php echo $vars["entity"]->cantante_favorito; ?>' />

<p><b>Gustos Comida</b></p>
	<input type='text' name='gustos_comida' value='<?php echo $vars["entity"]->gustos_comida; ?>' />

<p><b>Gustos Bebida</b></p>
	<input type='text' name='gustos_bebida' value='<?php echo $vars["entity"]->gustos_bebida; ?>' />

<p><b>Gustos Deportes</b></p>
	<input type='text' name='gustos_deportes' value='<?php echo $vars["entity"]->gustos_deportes; ?>' />

<p><b>Recibo Estado Cuenta</b></p>
	<input type='text' name='recibo_estado_cuenta' value='<?php echo $vars["entity"]->recibo_estado_cuenta; ?>' />

<p><b>Supervisor</b></p>
	<input type='text' name='supervisor' value='<?php echo $vars["entity"]->supervisor; ?>' />

<p><b>User Id</b></p>
	<input type='text' name='user_id' value='<?php echo $vars["entity"]->user_id; ?>' />

<input type="submit" name="submit" value="Save" />
		</form>