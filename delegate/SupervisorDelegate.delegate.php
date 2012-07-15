<?php

class SupervisorDelegate
{

	function uploadXML($validator){
		
		echo "Upload: " . $_FILES["file"]["name"] . "<br />";
	    echo "Type: " . $_FILES["file"]["type"] . "<br />";
	    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
	    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
		$OriginalFilename = $FinalFilename = preg_replace('`[^a-z0-9-_.]`i','',$_FILES['file']['name']); 
		$FileCounter = 1; 
		while (file_exists( 'docs/xml/'.$FinalFilename )) 
		  $FinalFilename = $FileCounter++.'_'.$OriginalFilename; 
	    
	    move_uploaded_file($_FILES["file"]["tmp_name"],"docs/xml/" . $FinalFilename );
	    echo "Stored in: " . "docs/xml/" . $FinalFilename;
		
		$doc = new DOMDocument();
        $doc->load( "docs/xml/" . $FinalFilename );
  
  	  	$gems = $doc->getElementsByTagName( "GEMCLUBS" );
		$q = Doctrine_Query::create()
		    	->from('tipo t');
		$tipos = $q->execute();
		
  		foreach( $gems as $gem )
		{
		  $clientes = $gem->getElementsByTagName( "GUEST" );
		  $cliente= $clientes->item(0)->nodeValue;
		  
		  $CRSRESNR = $gem->getElementsByTagName( "CODIGO" );
		  $socio = $CRSRESNR->item(0)->nodeValue;
		  
		  $a_dates = $gem->getElementsByTagName( "ARRIVAL" );
		  $arrival_date = date('Y-m-d',strtotime(preg_replace('#/#','-',$a_dates->item(0)->nodeValue)));
		  
		  $d_dates = $gem->getElementsByTagName( "DEPARTURE" );
		  $departure_date = date('Y-m-d',strtotime(preg_replace('#/#','-',$d_dates->item(0)->nodeValue)));
		  
		  $rate_codes = $gem->getElementsByTagName( "RATE" );
		  $rate_code = $rate_codes->item(0)->nodeValue;
		  
		  $rate_ammounts = $gem->getElementsByTagName( "RATE_AMOUNT" );
		  $rate_ammount = $rate_ammounts->item(0)->nodeValue;
		  
		  $rate_revenues = $gem->getElementsByTagName( "REVENUE" );
		  $rate_revenue = $rate_revenues->item(0)->nodeValue;
		  
		  $nameids = $gem->getElementsByTagName( "CONFIRMATION" );
		  $confirmacion = $nameids->item(0)->nodeValue;
		  
		  //$rooms = $gem->getElementsByTagName( "PREIS" );
		  //$room = $rooms->item(0)->nodeValue;
		  $room = 250;
		  $q = Doctrine_Query::create()
		    ->from('venta u')
		    ->where("u.confirmation='$confirmacion'");
		
		  $rows = $q->execute();
		  if(count($rows)==0){
			  $venta = new venta();
			  $venta->guest_name = $cliente;
			  $venta->room = $room;
			  $venta->code_socio = $socio;
			  $venta->arrival = $arrival_date;
			  $venta->departure = $departure_date;
			  $venta->rate_code = $rate_code;
			  $venta->rate_revenue = floatval($rate_revenue);
			  $venta->rate_ammount = floatval($rate_ammount);
			  $venta->confirmation = $confirmacion;
			  $venta->save();
		  	
			  $socio_bd = Doctrine::getTable('profile')->findOneBysocio($socio);
			  $aux = $socio_bd->revenue_total;
			  $socio_bd->revenue_total = $aux + floatval($rate_revenue);
			  $aux = $socio_bd->revenue_disponibles;
			  $socio_bd->revenue_disponibles = $aux + floatval($rate_revenue);
			  
			  if (($aux + floatval($rate_revenue)/1000)>1){
			  	$total_revenue = floatval($aux) + floatval($rate_revenue);
				$div_tr = $total_revenue / 1000;
				$redondeo = floor($div_tr);
			  	$puntos_redondeados = $redondeo*1000;
				$socio_bd->puntos_disponibles = $puntos_redondeados;
			  }
			  
			  $revenue_total = $aux + floatval($rate_revenue);
			  
			  foreach ($tipos as $tipo) {
			  	if (($revenue_total > $tipo["minimo"]) &&  ($revenue_total < $tipo["maximo"])){
					$socio_bd->tipo =  $tipo["id"]; 
					break;	
				}
			  }
			  
			  
			  
			  $socio_bd->save();
			  
		  }
		  else{
		  	echo "Existe el codigo de confirmacion " .  $confirmacion;
		  }
		  
		  //echo "$socio , $cliente , $arrival_date , $departure_date , $room , $rate_code , $rate_revenue,  $rate_ammount, $confirmacion<br/>";
	}
      	  
	}
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