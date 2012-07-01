<p><b>Socio</b></p>
	<input class="disabled" disabled="true" type='text' name='socio' value='<?php echo $vars["entity"]->socio; ?>' />

<p><b>Nombre</b></p>
	<input class="disabled" disabled="true" type='text' name='nombre' value='<?php echo $vars["entity"]->nombre; ?>' />

<p><b>Fecha de nacimiento</b></p>
	<input class="disabled" disabled="true" type='text' name='nombre' value='<?php echo $vars["entity"]->fecha_nacimiento; ?>' />

<p><b>Empresa</b></p>
	<input class="disabled" disabled="true" type='text' name='empresa' value='<?php echo $vars["entity"]->empresa; ?>' />

<p><b>Cargo</b></p>
	<input class="disabled" disabled="true" type='text' name='cargo' value='<?php echo $vars["entity"]->cargo; ?>' />

<p><b>Telefono</b></p>
	<input class="disabled" disabled="true" type='text' name='telefono' value='<?php echo $vars["entity"]->telefono; ?>' />

<p><b>Celular</b></p>
	<input class="disabled" disabled="true" type='text' name='celular' value='<?php echo $vars["entity"]->celular; ?>' />

<p><b>Fax</b></p>
	<input class="disabled" disabled="true" type='text' name='fax' value='<?php echo $vars["entity"]->fax; ?>' />

<p><b>Email</b></p>
	<input class="disabled" disabled="true" type='text' name='email' value='<?php echo $vars["entity"]->email; ?>' />

<p><b>Direccion</b></p>
	<input class="disabled" disabled="true" type='text' name='direccion' disabled="true" value='<?php echo $vars["entity"]->direccion; ?>' />

<p><b>Estado Civil</b></p>
	<input class="disabled" disabled="true" type='text' name='estado_civil' value='<?php echo $vars["entity"]->estado_civil; ?>' />

<p><b>Hijos</b></p>
	<input class="disabled span1" type='text' name='hijos' value='<?php echo $vars["entity"]->hijos; ?>' />

<p><b>Menores a 12 a&ntilde;os</b></p>
	<input class="disabled span1" disabled="true" type='text' name='hijos_menor_12' value='<?php echo $vars["entity"]->hijos_menor_12; ?>' />

<p><b>Entre 13 y 18 a&ntilde;os</b></p>
	<input class="disabled span1" disabled="true" type='text' name='hijos_13_18' value='<?php echo $vars["entity"]->hijos_13_18; ?>' />

<p><b>Mayores de 19 a&ntilde;os</b></p>
	<input class="disabled span1" disabled="true" type='text' name='hijos_19_mas' value='<?php echo $vars["entity"]->hijos_19_mas; ?>' />

<p><b>Gustos Generales</b></p>
	<input class="disabled" disabled="true" type='text' name='gustos_generales' value='<?php echo $vars["entity"]->gustos_generales; ?>' />

<p><b>Pasatiempos</b></p>
	<input class="disabled" disabled="true" type='text' name='gustos_pasatiempos' value='<?php echo $vars["entity"]->gustos_pasatiempos; ?>' />

<p><b>M&uacute;sica preferida</b></p>
	<input class="disabled" disabled="true" type='text' name='gustos_musica' value='<?php echo $vars["entity"]->gustos_musica; ?>' />

<p><b>Cantante Favorito</b></p>
	<input class="disabled" disabled="true" type='text' name='cantante_favorito' value='<?php echo $vars["entity"]->cantante_favorito; ?>' />

<p><b>Comida preferida</b></p>
	<input class="disabled" disabled="true" type='text' name='gustos_comida' value='<?php echo $vars["entity"]->gustos_comida; ?>' />

<p><b>Bebida preferida</b></p>
	<input class="disabled" disabled="true" type='text' name='gustos_bebida' value='<?php echo $vars["entity"]->gustos_bebida; ?>' />

<p><b>Deporte preferido</b></p>
	<input class="disabled" disabled="true" type='text' name='gustos_deportes' value='<?php echo $vars["entity"]->gustos_deportes; ?>' />

<p><b>Recibo Estado Cuenta</b></p>
	<input class="disabled" disabled="true" type='text' name='recibo_estado_cuenta' value='<?php echo $vars["entity"]->recibo_estado_cuenta; ?>' />

<a class="btn-success" href="crud.php?view=add-profile&action=cambiarStatus&id=<?php echo $vars["entity"]->id; ?>&status=valido">Aceptar</a>
<a class="btn-success" href="crud.php?view=add-profile&action=cambiarStatus&id=<?php echo $vars["entity"]->id; ?>&status=rechazado">Rechazar</a>
