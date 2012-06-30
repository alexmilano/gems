<form name="NewContasenaForm" id= "NewContasenaForm" action="crud.php" method="post">
 <input type="hidden" name="action" value="CambiarContrasena"/>
 <input type="hidden" name="view" value="change-password"/>
 <div class="error" id="standardError" style="display:none;"></div>
 <fieldset>
 	<legend>Change Password</legend>
 	<div class="clearfix">
 		<label>Password</label>
 		<div class="input">
	        <input name="contrasena" type="password" id="contrasena" maxlength="250">
			<span class="help-inline" id="contrasenaError"></span>
 		</div>
 	</div>
 	<div class="clearfix">
 		<label>New Password</label>
 		<div class="input">
            <input name="contrasenaNew" type="password" id="contrasenaNew" maxlength="250">
			<span class="help-inline" id="contrasenaNewError"></span>
 		</div>
 	</div>
 	<div class="clearfix">
 		<label>Retype Password</label>
 		<div class="input">
            <input name="contrasenaReNew" type="password" id="contrasenaReNew" maxlength="250">
			<span class="help-inline" id="contrasenaNewReError"></span>
 		</div>
 	</div>
 	<div class="actions">
            <input type="submit" name="button" class="btn blue" id="button" value="Aceptar">
 	</div>
 </fieldset>

</form>