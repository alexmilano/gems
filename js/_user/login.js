 $(document).ready(function(){

	$('#loginForm').ajaxForm({

					target:         '#alert-message',
					beforeSubmit:     validateloginForm ,
					success: function(message) {
						$("#standardError").html(message);
						$("#alert-message").show().fadeOut(3000);
						
					}
			});

 });

function noEmpty(str) {
    return (!str || 0 === str.length);
}

function isValidEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 

 function validateloginForm(formData, jqForm, options)
{
	var errors          = 0;

	$("#userError").empty().hide();
	$("#passwordError").empty().hide();

	var email         	= $("#user").val();
	var password         	= $("#password").val();

	if (noEmpty(email) /*|| !isValidEmail(email)*/)
	{
		errors++;
	}
	if (noEmpty(password))
	{
		errors++;
	}
    if (errors > 0)
    {
		$("#standardError").html("Invalid username or password");
    	$('#alert-message').show().fadeOut(3000);
        return false;
    }
	else
	{
		formData[formData.length-1] = {"name": "user", "value": email};
		formData[formData.length] = { "name": "password", "value": $.sha1(password) };
		return true;
	}
}