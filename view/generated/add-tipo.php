<form action="crud.php" method="post">
	<input type="hidden" name="action" value="insert" />
	<input type="hidden" name="view" value="add-tipo" />
	<input type='hidden' name='id' value='' />

	<p><b>Nombre</b></p>
	<input type='text' name='nombre' value='' />
	<p><b>Valor minimo ($)</b></p>
	<input type='text' name='minimo' value='' />
	<p><b>Valor maximo ($)</b></p>
	<input type='text' name='maximo' value='' />

<input type="submit" name="submit" value="Save" />
</form>