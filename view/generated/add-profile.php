<form action="crud.php" method="post" class="form-inline">
	<input type="hidden" name="action" value="insert" />
	<input type="hidden" name="view" value="add-profile" />
	<input type='hidden' name='id' value='' />
	

	<p><b>Nombre</b></p>
		<input type='text' name='nombre' value='' />
		
	<p><b>Fecha de nacimiento</b></p>
		<input type="text" name="fecha_nacimiento" value="" />
	
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
		<input type='number' name='hijos' value='' class="span1"/>
	
	<p><b>Menores a 12 a&ntilde;os</b></p>
		<input type='number' name='hijos_menor_12' value='' class="span1" />
	
	<p><b>Entre 13 y 18 a&ntilde;os</b></p>
		<input type='number' name='hijos_13_18' value='' class="span1"/>
	
	<p><b>Mayores a 19 a&ntilde;os</b></p>
		<input type='number' name='hijos_19_mas' value='' class="span1"/>
	
	<div class="control-group">
		<label><b>&iquest;Qu&eacute; le gusta m&aacute;s entre?:</b></label>
		<div class="controls">
			<label class="radio inline">
				<input type="radio" name="gustos_generales" value="chocolates"/>
				Chocolates
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_generales" value="flores"/>
				Flores
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_generales" value="caramelos"/>
				Caramelos
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_generales" value="Dulces"/>
				Dulces
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_generales" value="vinos"/>
				Vinos
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_generales" value="otros"/>
				Otros
			</label>
			<input type="text" name="otros_gustos_generales" value="" />
		</div>
	</div>
	
	<div class="control-group">
		<label><b>Pasatiempos</b></label>
		<div class="controls">
			<label class="radio inline">
				<input type="radio" name="gustos_pasatiempos" value="viajar"/>
				Viajar
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_pasatiempos" value="tv"/>
				Ver TV
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_pasatiempos" value="leer"/>
				Leer
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_pasatiempos" value="compras"/>
				Ir de compras
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_pasatiempos" value="cine"/>
				Ir al cine
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_pasatiempos" value="bailar"/>
				Bailar
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_pasatiempos" value="otros"/>
				Otros
			</label>
			<input type="text" name="otros_gustos_pasatiempos" value="" />
		</div>
	</div>

	<div class="control-group">
		<label><b>M&uacute;sica preferida</b></label>
		<div class="controls">
			<label class="radio inline">
				<input type="radio" name="gustos_musica" value="jazz"/>
				Jazz
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_musica" value="salsa"/>
				Salsa
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_musica" value="pop"/>
				Pop
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_musica" value="balada"/>
				Balada
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_musica" value="tipico"/>
				T&iacute;pico
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_musica" value="merengue"/>
				Merengue
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_musica" value="otros"/>
				Otros
			</label>
			<input type="text" name="otros_gustos_musica" value="" />
		</div>
	</div>
	
	<p><b>Cantante Favorito</b></p>
		<input type='text' name='cantante_favorito' value='' />
	
	
	<div class="control-group">
		<label><b>Comida preferida</b></label>
		<div class="controls">
			<label class="radio inline">
				<input type="radio" name="gustos_comida" value="mariscos"/>
				Mariscos
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_comida" value="vegetariana"/>
				Vegetariana
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_comida" value="fusion"/>
				Fusión
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_comida" value="carnes"/>
				Carnes
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_comida" value="otros"/>
				Otros
			</label>
			<input type="text" name="otros_gustos_comida" value="" />
		</div>
	</div>
	
	<div class="control-group">
		<label><b>Comida preferida</b></label>
		<div class="controls">
			<label class="radio inline">
				<input type="radio" name="gustos_bebida" value="whisky"/>
				Whisky
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_bebida" value="ron"/>
				Ron
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_bebida" value="vodka"/>
				Vodka
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_bebida" value="cerveza"/>
				Cerveza
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_bebida" value="seco"/>
				Seco
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_bebida" value="vino"/>
				Vino
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_bebida" value="otros"/>
				Otros
			</label>
			<input type="text" name="otros_gustos_bebida" value="" />
		</div>
	</div>
	
	<div class="control-group">
		<label><b>Deportes preferidos</b></label>
		<div class="controls">
			<label class="radio inline">
				<input type="radio" name="gustos_deportes" value="baseball"/>
				Baseball
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_deportes" value="futbol"/>
				F&uacute;tbol
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_deportes" value="golf"/>
				Golf
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_deportes" value="tennis"/>
				Tennis
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_deportes" value="baloncesto"/>
				Baloncesto
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_deportes" value="carrera"/>
				Carrera de autos
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_deportes" value="atletismo"/>
				Atletismo
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_deportes" value="natacion"/>
				Nataci&oacute;n
			</label>
			<label class="radio inline">
				<input type="radio" name="gustos_deportes" value="otros"/>
				Otros
			</label>
			<input type="text" name="otros_gustos_deportes" value="" />
		</div>
	</div>	
	
	<p><b>Recibo Estado Cuenta</b></p>
		<select name='recibo_estado_cuenta' >
			<option value="email">Email</option>
			<option value="fax">Fax</option>
			<option value="personalmente">Personalmente</option>
		</select>

	<input type="submit" name="submit" value="Save" />
</form>