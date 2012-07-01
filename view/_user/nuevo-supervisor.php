<div id="main-content">
	<div class="alert-message error" id="alert-message" style="display:none;">
	  <p id="standardError">Best check yo self, you’re not looking too good.</p>
	</div>
	<form action="crud.php" id="theform" >
	    <input name="action" type="hidden" value="newUser" />
	    <fieldset>
			<legend>Sign in</legend>
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
	    </fieldset>
			<div class="clearfix">
		        <label>Repeat Password: </label>
				<div class="input">
			        <input class="span4" name="rep_password" id="rep_password" type="password" />		
				</div>
		        <strong class="error" id="passwordError"></strong>
			</div>
	    </fieldset>
	    <div class="actions">
	        <input name="" type="submit" class="btn medium blue" value="Log in" />
	    </div>
    </form>
</div>