<?php

class SupervisorDelegate
{


	function getRoles($validator)
	{

		$q = Doctrine_Query::create()->from("role");
		$records = $q->execute();

		return $records;
	}

	function getLocations($validator)
	{

		$q = Doctrine_Query::create()->from("location");
		$records = $q->execute();

		return $records;
	}

	function newUser($validator)
	{
		$email = $validator->getVar("email");
		$q = Doctrine_Query::create()
		    ->from('user u')
		    ->where("u.email='$email'");
		$rows = $q->execute();
		$random = rand(0,999999999);

		if(count($rows)==0)
		{
			$random = rand(0,999999999);
			$entity = new user();
			$entity->email=$email;
			$entity->password=$validator->getVar("password");
			$entity->validation_code=$random;
			$entity->role_id = $validator->getVar("rol");
			$entity->status = "valido";
			$entity->save();
		}
		else
			$validator->addError('The user "'.$email.'" already exists.');

		$idUsuario=mysql_insert_id();

		if($validator->getTotalErrors()==0)
		{
			require_once('phputils/class.phpmailer.php');

			try {
				$mail = new PHPMailer(true); //New instance, with exceptions enabled
				//$body             = file_get_contents('contents.html');
				$body = 'Hola '.$email.', eres el nuevo administrador en GEMS, para ingresar, ve al siguiente enlace: '. $GLOBALS['baseURL'];
				$body             = preg_replace('/\\\\/','', $body); //Strip backslashes
				//$mail->IsSMTP();                           // tell the class to use SMTP
				//$mail->SMTPAuth   = true;                  // enable SMTP authentication
				//$mail->Port       = 587;                    // set the SMTP server port
				//$mail->Host       = "smtp.gmail.com"; // SMTP server
				//$mail->Username   = "email@gmail.com";     // SMTP server username
				//$mail->Password   = "";            // SMTP server password
				//$mail->IsSendmail();  // tell the class to use Sendmail
				//$mail->AddReplyTo("email@domain.com","domain.com");
				$mail->From       = "no-reply@gems.com";
				$mail->FromName   = "GEMS";
				$mail->AddBCC($email);
				$mail->Subject  = "Eres supervisor en GEMS";
				$mail->AltBody    = $body = 'Hola '.$email.', eres el nuevo administrador en GEMS, para ingresar, ve al siguiente enlace: '. $GLOBALS['baseURL'];
				$mail->WordWrap   = 80; // set word wrap
				$mail->MsgHTML($body);
				$mail->IsHTML(true); // send as HTML
				$mail->Send();

				

			} catch (phpmailerException $e) {
				//$validator->addError("PHPMailer:".$e->errorMessage());
			}

		}

		return 'controller.php?view=supervisores';
	}
	function listRecords($validator)
	{

		$q = Doctrine_Query::create()->from("user u")->where("u.role_id = 2");
		$records = $q->execute();

		return $records;
	}

}


?>