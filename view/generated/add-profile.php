
			<form action="crud.php" method="post">
				<input type="hidden" name="action" value="insert" />
			<input type='hidden' name='id' value='' />

<p><b>Socio</b></p>
	<input type='text' name='socio' value='' />

<p><b>Nombre</b></p>
	<input type='text' name='nombre' value='' />

<p><b>Empresa</b></p>
	<input type='text' name='empresa' value='' />

<p><b>Cargo</b></p>
	<input type='text' name='cargo' value='' />

<p><b>Telefono</b></p>
	<input type='tel' name='telefono' value='' />

<p><b>Celular</b></p>
	<input type='text' name='celular' value='' />

<p><b>Fax</b></p>
	<input type='text' name='fax' value='' />

<p><b>Email</b></p>
	<input type='email' name='email' value='' />

<p><b>Direccion</b></p>
	<input type='text' name='direccion' value='' />

<p><b>Estado Civil</b></p>
	<select name='estado_civil'>
		<option value="soltero">Soltero(a)</option>
		<option value="casado">Casado(a)</option>
		<option value="unido">Unido(a)</option>
		<option value="otro">Otros</option>
	</select>
	<input type="text" name="otros" value=""/>

<p><b>Hijos</b></p>
	<input type='number' name='hijos' value='' class="mini"/>

<p><b>Menores a 12 a&ntilde;os</b></p>
	<input type='text' name='hijos_menor_12' value='' class="mini" />

<p><b>Entre 13 y 18 a&ntilde;os</b></p>
	<input type='text' name='hijos_13_18' value='' class="mini"/>

<p><b>Mayores a 19 a&ntilde;os</b></p>
	<input type='text' name='hijos_19_mas' value='' class="mini"/>

<div class="control-group">
	<label>Gustos generales</label>
	<div class="controls">
		
	</div>
</div>

<p><b>Gustos Generales</b></p>
	<select name='gustos_generales' ></select>

<p><b>Gustos Pasatiempos</b></p>
	<input type='text' name='gustos_pasatiempos' value='' />

<p><b>Gustos Musica</b></p>
	<input type='text' name='gustos_musica' value='' />

<p><b>Cantante Favorito</b></p>
	<input type='text' name='cantante_favorito' value='' />

<p><b>Gustos Comida</b></p>
	<input type='text' name='gustos_comida' value='' />

<p><b>Gustos Bebida</b></p>
	<input type='text' name='gustos_bebida' value='' />

<p><b>Gustos Deportes</b></p>
	<input type='text' name='gustos_deportes' value='' />

<p><b>Recibo Estado Cuenta</b></p>
	<input type='text' name='recibo_estado_cuenta' value='' />

<p><b>Supervisor</b></p>
	<input type='text' name='supervisor' value='' />

<p><b>User Id</b></p>
	<input type='text' name='user_id' value='' />

<input type="submit" name="submit" value="Save" />
			</form>