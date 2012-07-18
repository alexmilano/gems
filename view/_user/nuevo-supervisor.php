<div id="main-content">
	<div class="alert-message error" id="alert-message" style="display:none;">
	  <p id="standardError">Best check yo self, you’re not looking too good.</p>
	</div>
	<form action="crud.php" id="theform" >
	    <input name="action" type="hidden" value="newUser" />
	    <input name="view" type="hidden" value="nuevo-supervisor" />
	    <fieldset>
			<legend>Nuevo Supervisor</legend>
			<div class="clearfix">
				<label for="nombre">Nombre: </label>
				<div class="input">
					<input class="span4" name="nombre" id="nombre" type="text" title="Nombre" />
					<strong class="error" id="nombreError"></strong>
				</div>
			</div>
			<div class="clearfix">
				<label for="user">Email: </label>
				<div class="input">
					<input class="span4" name="email" id="email" type="text" title="Email address" />
					<strong class="error" id="userError"></strong>
				</div>
			</div>
			<div class="clearfix">
		        <label>Password: </label>
				<div class="input">
			        <input class="span4" name="password" id="password" type="password" />		
				</div>
		        <strong class="error" id="passwordError"></strong>
			</div>
	    
			<div class="clearfix">
		        <label>Repeat Password: </label>
				<div class="input">
			        <input class="span4" name="rep_password" id="rep_password" type="password" />		
				</div>
		        <strong class="error" id="passwordError"></strong>
			</div>
			<div class="clearfix">
		        <label>Rol: </label>
				<div class="input">
					<select name="rol">
						
						<option value="3">Administrador</option>
						<option value="2">Supervisor</option>
						
					</select>
			        	
				</div>
		        <strong class="error" id="passwordError"></strong>
			</div>
		</fieldset>
	    <div class="actions">
	        <input name="" type="submit" class="btn medium blue" value="Registrar" />
	    </div>
    </form>
</div>