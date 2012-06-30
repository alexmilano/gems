 $(document).ready(function(){

	$('#theform').ajaxForm({

						target:         '#standardError',
						beforeSubmit:     validatetheform ,
						success: function()
						{
							$("#standardError").show();
						}
			});

 });

function validatetheform(formData, jqForm, options)
{
	var errors          = 0;

	$("#emailError").empty().hide();
	$("#passwordError").empty().hide();
	$("#rep_passwordError").empty().hide();

	var email         	= $("#email").val();
	var password         	= $("#password").val();
	var rep_password         	= $("#rep_password").val();

	if (noEmpty(email) || !isValidEmail(email))
	{
		$("#emailError").show().append("Email invalido");
		errors++;
	}
	if (noEmpty(password))
	{
		$("#passwordError").show().append("Clave invalida");
		errors++;
	}
	if (noEmpty(rep_password))
	{
		$("#rep_passwordError").show().append("Clave invalida");
		errors++;
	}
	else if(password!=rep_password)
	{
		$("#rep_passwordError").show().append("Clave invalida");
		errors++;
	}


    if (errors > 0)
    {
        return false;
    }
	else
	{
		formData[formData.length] = { "name": "password", "value": $.sha1(password) };
		formData[formData.length] = { "name": "rep_password", "value": "" };
		return true;
	}

}