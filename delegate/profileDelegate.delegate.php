<?php

include 'plugins/Sendgrid/SendGrid_loader.php';
include 'phputils/sendGridMaker.php';

class profileDelegate
{

	public function profileDelegate(){
		return "";
	}
	
	function getCodigo($codigo){
		$records = Doctrine::getTable('profile')->findOneBysocio($codigo);
		return $records;
	}
	
	function insert($validator)
	{
		$email = $validator->getVar("email");
		$q = Doctrine_Query::create()
    		->from('user u')
    		->where("u.email='$email'");
		$rows = $q->execute();
		$random = rand(0,999999999);

		if(count($rows)==0)
		{
			$user = new user();
			$user->email = $validator->getVar("email");
			$user->validation_code=rand(0,999999999);
			$user->status='pending';	
			$user->save();
			
			$nombre = $validator->getVar("nombre");
			$fecha_nac = date_create($validator->getVar("fecha_nacimiento")); //la fecha debe venir como string
			$dia_nac = date_format($fecha_nac, 'd');
			$first_letter = $nombre[0]; 
			$codigo =  $first_letter . $dia_nac ;
			$records = Doctrine::getTable('profile')->findOneBysocio($codigo);
			$gc = $this->getCodigo($codigo);
			while ( $gc != NULL){
				$codigo = $first_letter . rand (0,99);
				$gc = $this->getCodigo($codigo);
			}
				
			$entity = new profile();
			
			
	    	$entity->socio= $codigo;
	    	$entity->nombre=$nombre;
			
			
	    	$entity->fecha_nacimiento = date('Y-m-d',strtotime(preg_replace('#/#','-',$validator->getVar("fecha_nacimiento"))));
			$entity->empresa=$validator->getVar("empresa");
			$entity->cargo=$validator->getVar("cargo");
			$entity->telefono=$validator->getVar("telefono");
			$entity->celular=$validator->getVar("celular");
			$entity->fax=$validator->getVar("fax");
			$entity->email=$email;
			$entity->direccion=$validator->getVar("direccion");
			$entity->estado_civil=$validator->getVar("estado_civil");
			$entity->hijos=$validator->getVar("hijos");
			$entity->hijos_menor_12=$validator->getVar("hijos_menor_12");
			$entity->hijos_13_18=$validator->getVar("hijos_13_18");
			$entity->hijos_19_mas=$validator->getVar("hijos_19_mas");
			$entity->gustos_generales=$validator->getVar("gustos_generales");
			$entity->gustos_pasatiempos=$validator->getVar("gustos_pasatiempos");
			$entity->gustos_musica=$validator->getVar("gustos_musica");
			$entity->cantante_favorito=$validator->getVar("cantante_favorito");
			$entity->gustos_comida=$validator->getVar("gustos_comida");
			$entity->gustos_bebida=$validator->getVar("gustos_bebida");
			$entity->gustos_deportes=$validator->getVar("gustos_deportes");
			$entity->recibo_estado_cuenta=$validator->getVar("recibo_estado_cuenta");
			$entity->supervisor = -1;
			$entity->fecha_inscripcion= date('Y-m-d');
			$entity->user_id=$user->id;
			$sMaker = new sendGridMaker();
			if($sendgrid = $sMaker->getSenGrid() != NULL){
				$mail = new SendGrid\Mail();
				$mail->addTo($email)->
						setFrom($GLOBALS["GEMS_EMAIL"])->
						setSubject("Inscripci&oacute;n Gems Club")->
						setText("Gracias por preferirnos, estamos procesando su solicitud, en cuanto haya sido tramitada usted
						recibir&aacute; su c&oacute;digo de socia y su contrase&ntilde;a a su correo electr&oacute;nico.");

				$sendgrid->smtp->send($mail);
			}
			
			$entity->save();
				
		}
		else
		{
			$validator->addError('El usuario '.$email.' ya esta en el sistema.');
			echo 'El usuario '.$email.' ya esta en el sistema.';
		}
				
		return "validate";
	}

	function update($validator){
		
		$id = $validator->getVar("id");$record = Doctrine::getTable("profile")->find($id);
    	$record->nombre=$validator->getVar("nombre");
    	$record->fecha_nacimiento=$validator->getVar("fecha_nacimiento");
    	$record->empresa=$validator->getVar("empresa");
    	$record->cargo=$validator->getVar("cargo");
    	$record->telefono=$validator->getVar("telefono");
    	$record->celular=$validator->getVar("celular");
    	$record->fax=$validator->getVar("fax");
    	$record->email=$validator->getVar("email");
    	$record->direccion=$validator->getVar("direccion");
    	$record->estado_civil=$validator->getVar("estado_civil");
    	$record->hijos=$validator->getVar("hijos");
    	$record->hijos_menor_12=$validator->getVar("hijos_menor_12");
    	$record->hijos_13_18=$validator->getVar("hijos_13_18");
    	$record->hijos_19_mas=$validator->getVar("hijos_19_mas");
    	$record->gustos_generales=$validator->getVar("gustos_generales");
    	$record->gustos_pasatiempos=$validator->getVar("gustos_pasatiempos");
    	$record->gustos_musica=$validator->getVar("gustos_musica");
    	$record->cantante_favorito=$validator->getVar("cantante_favorito");
    	$record->gustos_comida=$validator->getVar("gustos_comida");
    	$record->gustos_bebida=$validator->getVar("gustos_bebida");
    	$record->gustos_deportes=$validator->getVar("gustos_deportes");
    	$record->recibo_estado_cuenta=$validator->getVar("recibo_estado_cuenta");
    	$record->supervisor=$validator->getVar("supervisor");
    	$record->fecha_inscripcion=$validator->getVar("fecha_inscripcion");
    	$record->user_id=$validator->getVar("user_id");
		$record->status = "Pendiente";
    	$record->save();

		return "controller.php?view=list-profile&idprofile=".$validator->getVar("id");
	}

	function cambiarStatus($validator){
		
		$id = $validator->getVar("id");
		$status = $validator->getVar("status");
		$record = Doctrine::getTable("profile")->find($id);
		$user = Doctrine::getTable("user")->find($record->user_id);
		$record->supervisor=$_SESSION['user']->gem_id;
		$user->status = $status;
		$record->status = $status;
		$random = rand(0,999999999);
		$pass = sha1($random);
		$user->password= $pass;
		$user->save();
		$record->save();
		
			
		$make = new sendGridMaker();
		if($sendgrid = $make->getSenGrid() != NULL){
			
			$html = "
					<html>
					  <head></head>
					  <body>
					    <p>Usted estar&acute; identificado con la informaci&oacute; de acceso:<br/><<br/>
					    correo: $record->email 
						<br/>
						contrase&ntilde;a: $random 
						<br/><br/>
						La cual le permitirá acumular puntos en sus reservas de habitaciones y eventos.
						<br/><br/>
						Agradecemos su confianza y su preferencia en Hotel El Panamá para sus reservas y eventos.
						<br/><br/>
						Esperamos disfruten de todos los beneficios que ofrecemos.
					    <br/><br/>
					    <i>Importante: Recuerde proporcionar su c&oacute;digo que lo(a) identifica como socio(a) de nuestro Gems Club, al realizar sus
							reservas de habitaciones o eventos en nuestro Hotel.</i>
					    </p>
					  </body>
					</html>
					";
			
			$mail = new SendGrid\Mail();
			$mail->addTo($record->$email)->
					setFrom($GLOBALS["GEMS_EMAIL"])->
					setSubject("Bienvenida(o) a nuestro Programa de Lealtad Empresarial Gems Club")->
					/*setText("Usted estar&acute; identificado con la informaci&oacute; de acceso:
					\n\n 
					correo: $record->email 
					\n 
					contrase&ntilde;a: $random 
					\n\n 
					La cual le permitirá acumular puntos en sus reservas de habitaciones y eventos.
					\n\n
					Agradecemos su confianza y su preferencia en Hotel El Panamá para sus reservas y eventos.
					\n\n
					Esperamos disfruten de todos los beneficios que ofrecemos.");*/
					setBody($html, 'text/html');

				$sendgrid->smtp->send($mail);
		}
		
		$user->save();
		$record->save();
		
		/*require_once('phputils/class.phpmailer.php');

		try {
			
			$mail = new PHPMailer(true); 
			$body = 'Hola '.$record->nombre .', Bienvenido!, tu contrasena provisional es '.$random.'. Puedes ingresar a la aplicacion desde este enlace: '.$GLOBALS["baseURL"].', recuerda cambiar tu contrasena!';
			$body             = preg_replace('/\\\\/','', $body); //Strip backslashes
			$mail->From       = "no-reply@gems.com";
			$mail->FromName   = "gems.com";
			$mail->AddBCC($record->email);
			$mail->Subject  = "Has sido aprobado como socio en GEMS";
			$mail->AltBody    = 'Hola'.$record->nombre .', Bienvenido!, tu contrasena provisional es '.$random.'. Puedes ingresar a la aplicacion desde este enlace: '.$GLOBALS["baseURL"].', recuerda cambiar tu contrasena!';
			$mail->WordWrap   = 80; // set word wrap
			$mail->MsgHTML($body);
			$mail->IsHTML(true); // send as HTML
			$mail->Send();


		} catch (phpmailerException $e) {
			//$validator->addError("PHPMailer:".$e->errorMessage());
		}*/
		
		return "controller.php?view=list-profile&status=pendiente";
	}

	function delete($validator){
		$id = $validator->getVar("id");

		$q = Doctrine_Query::create()->delete("profile a")->where("a.id = ".$id);
		$q->execute();

		return "controller.php?view=list-profile";
	}
	
	function GetCumpleanos($validator){
	
		$q = Doctrine_Query::create()->from("profile a")->where("MONTH(a.fecha_nacimiento) = '".date('m')."'");
		$records = $q->execute();
	
		return $records;
	}
			
	function listRecords($validator){

		$q = Doctrine_Query::create()->from("profile a")->where("a.status = '". $validator->getVar('status') . "'");
		$records = $q->execute();

		return $records;
	}

	function getprofile($validator){
		$id = $validator->getVar("idprofile");

		$records = Doctrine::getTable('profile')->find($id);

			return $records;
	}

}

?>
