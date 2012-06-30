<?php

class PasswordDelegate
{

    public  function CambiarContrasena($validator)
	 {
	   // función encargada de realizar  el cambio de contraseña de un usuario

	   $contra = $validator->getVar('contrasena','Contraseña');
	   $contraNew = $validator->getVar('contrasenaNew','Nueva Contraseña');
	   $contraNew2 = $validator->getVar('contrasenaReNew','Reescribir Contraseña');
	   $usuario = $_SESSION['user']->id;

   	   $record = Doctrine::getTable('user')->find($usuario);

		 if ((!empty($record))&&($contraNew == $contraNew2)&&($record->password == $contra))
		 {
		 	$record->password = $contraNew;
		 	$record->save();

		   return 'controller.php?view=private';

		 }
		 else
		 {
		   $validator->addError('No se realizo el cambio de contraseña');

		 }

	 } // fin de la función CambiarContrasena

	 public function OlvidarContrasena($validator)
	 {

		$emailString = $validator->getVar('emails');
		$random = rand(0,999999999);
		$pass = sha1($random);


		$result = $validator->exect("SELECT * FROM `user` WHERE email='$emailString'");
		$obj = mysql_fetch_object($result);

		if($obj && $obj->status=="valid")
		{
			$record = Doctrine::getTable("User")->find($obj->id);
			$record->password = $pass;
			$record->save();

			require_once('phputils/class.phpmailer.php');

			try {
					$mail = new PHPMailer(true); //New instance, with exceptions enabled
					//$body             = file_get_contents('contents.html');
					$body = 'Hi '.$emailString.', you have requested to be reminded of your password. Your new password is '.$random.', if you have not request this password remind please <a href="#">click here</a> and fill you complaint.';
					$body             = preg_replace('/\\\\/','', $body); //Strip backslashes
					//$mail->IsSMTP();                           // tell the class to use SMTP
					//$mail->SMTPAuth   = true;                  // enable SMTP authentication
					//$mail->Port       = 587;                    // set the SMTP server port
					//$mail->Host       = "smtp.gmail.com"; // SMTP server
					//$mail->Username   = "no-reply@ivoted.com";     // SMTP server username
					//$mail->Password   = "7639P2";            // SMTP server password
					//$mail->IsSendmail();  // tell the class to use Sendmail
					//$mail->AddReplyTo("user@domain.com","domain.com");
					$mail->From       = "no-reply@ivoted.com";
					$mail->FromName   = "IVoted.com";
					$mail->AddBCC($emailString);
					$mail->Subject  = "IVoted.com password remind.";
					$mail->AltBody    = 'Hi '.$emailString.', you have requested to be reminded of your password. Your new password is '.$random.', if you have not request this password remind please reply this email with your complaint.';
					$mail->WordWrap   = 80; // set word wrap
					$mail->MsgHTML($body);
					$mail->IsHTML(true); // send as HTML
					$mail->Send();

				} catch (phpmailerException $e) {
					//$validator->addError("PHPMailer:".$e->errorMessage());
				}

			return 'controller.php?view=login';

		}
		else
		{
			return 'controller.php?view=validate';
		}
	 } //fin de la función OlvidarContrasena

}// Fin de la clase Contrasena

?>
