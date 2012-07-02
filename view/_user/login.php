<div id="main-content">
	<div class="alert-message error" id="alert-message" style="display:none;">
	  <p id="standardError">Best check yo self, you’re not looking too good.</p>
	</div>
	<form action="crud.php" id="loginForm" >
	    <input name="autenticate" type="hidden" value="" />
	    <fieldset>
			<legend>Iniciar Sesion</legend>
			<div class="clearfix">
				<label for="user">Email: </label>
				<div class="input">
					<input class="span4" name="user" id="user" type="text" title="username" />
					<strong class="error" id="userError"></strong>
				</div>
			</div>
			<div class="clearfix">
		        <label>Constrasena: </label>
				<div class="input">
			        <input class="span4" name="password" id="password" type="password" />		
			        <span class="help-block">
	                	<a href="controller.php?view=forgot">Olvido su contrasena? </a>
	              	</span>
				</div>
		        <strong class="error" id="passwordError"></strong>
			</div>
	    </fieldset>
	    <div class="actions">
	        <input name="" type="submit" class="btn medium blue" value="Iniciar sesion" />
	    </div>
    </form>
    Puedes aplicar a ser socio<a href="aplicar"> aqui </a>
</div>
