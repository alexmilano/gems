 $(document).ready(function(){

	$('#NewContasenaForm').ajaxForm({

					target:         '#standardError',
					beforeSubmit:     validatechangePassword ,
					success: function() {
						$("#standardError").show();
					}
			});

 });
//Para el estudiante
function validatechangePassword(formData, jqForm, options)
{

   $("#contrasenaError").empty().hide();
   $("#contrasenaNewError").empty().hide();
   $("#contrasenaNewReError").empty().hide();

   var errors               = 0;
   var contra           	= $("#contrasena").val();
   var contraNew         	= $("#contrasenaNew").val();
   var contraReNew         	= $("#contrasenaReNew").val();

   if (noEmpty(contra))
	{
		$("#contrasenaError").show().append("This field is empty.");
		errors++;
	}
   if (noEmpty(contraNew))
	{
		$("#contrasenaNewError").show().append("This field is empty.");
		errors++;
	}
   if (noEmpty(contraReNew) || contraReNew!=contraNew)
	{
		$("#contrasenaNewReError").show().append("This field is empty.");
		errors++;
	}



	 if (errors > 0)
    {
		$("#standardError").empty();
	    return false;
    }
	 else
	{
	    formData[formData.length] = { "name": "contrasena", "value": $.sha1(contra) };
		formData[formData.length] = { "name": "contrasenaNew", "value": $.sha1(contraNew) };
		formData[formData.length] = { "name": "contrasenaReNew", "value": $.sha1(contraReNew) };
		return true;
	}

}//Fin de la funci�n validatechangePassword