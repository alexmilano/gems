<form action="crud.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="view" value="nuevo-registro" />
	<input type="hidden" name="action" value="uploadXML" />
	
	<input type='hidden' name='id' value='' />
	<label for="file">Filename:</label>
	<input type="file" name="file" id="file" /> 
	<br />
	<input class="btn" data-loading-text="loading stuff..." type="submit" name="submit" value="Submit" />
</form>

