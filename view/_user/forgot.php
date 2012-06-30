<div id="main-content">
	<div class="alert-message error" id="alert-message" style="display:none;">
	  <p id="standardError">Best check yo self, you’re not looking too good.</p>
	</div>
	<form action="crud.php" id="olvidarForm" >
		<input type="hidden" name="view" value="forgot" />
		<input type="hidden" name="action" value="OlvidarContrasena"/>
	    <fieldset>
			<legend>Account email</legend>
			<div class="clearfix">
				<label for="user">Email: </label>
				<div class="input">
					<input class="span4" name="emails" id="textfield" type="text" title="username" />
					<strong class="error" id="userError"></strong>
				</div>
			</div>
	    </fieldset>
	    <div class="actions">
	        <input name="" type="submit" class="btn medium blue" value="Send password" />
	    </div>
    </form>
</div>


