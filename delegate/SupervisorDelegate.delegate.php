<?php

class SignupDelegate
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
				$body = 'Hi '.$email.', Welcome!, your validation code is '.$random.'. Before you can log into the system you must click on the following link: '.$GLOBALS["baseURL"].'crud.php?public_action=validate&a='.$random.'&b='.$entity->id;
				$body             = preg_replace('/\\\\/','', $body); //Strip backslashes
				//$mail->IsSMTP();                           // tell the class to use SMTP
				//$mail->SMTPAuth   = true;                  // enable SMTP authentication
				//$mail->Port       = 587;                    // set the SMTP server port
				//$mail->Host       = "smtp.gmail.com"; // SMTP server
				//$mail->Username   = "email@gmail.com";     // SMTP server username
				//$mail->Password   = "";            // SMTP server password
				//$mail->IsSendmail();  // tell the class to use Sendmail
				//$mail->AddReplyTo("email@domain.com","domain.com");
				$mail->From       = "no-reply@domain.com";
				$mail->FromName   = "Domain.com";
				$mail->AddBCC($email);
				$mail->Subject  = "Domain.com Registration";
				$mail->AltBody    = 'Hi '.$email.', welcome!, your validation code is '.$random.'. Before you can log into the system you must copy the following link into you browser: '.$GLOBALS["baseURL"].'crud.php?public_action=validate&a='.$random.'&b='.$entity->id;
				$mail->WordWrap   = 80; // set word wrap
				$mail->MsgHTML($body);
				$mail->IsHTML(true); // send as HTML
				$mail->Send();

				$_SESSION['user']->status='pending';
				$_SESSION['user']->name = $email;

			} catch (phpmailerException $e) {
				//$validator->addError("PHPMailer:".$e->errorMessage());
			}

		}

		return 'controller.php?view=validate';
	}

}


?>