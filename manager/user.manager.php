<?php

//////////////////////////////////////////////////////
//Esta clase se encarga de renderizar la view deseada
//////////////////////////////////////////////////////

class UserManager
{
	var $validator;

	public function UserManager()
	{
		$this->validator = new httpRequestValidator('UserManager');
	}

	public function validate($user,$password)
	{
		if (!isset($user)) $user = new CocoasUser();
		$cuenta = 0;

		try
		{
			$this->connection = Doctrine_Manager::connection();
			$q = Doctrine_Query::create()
				->from('user u')
				->where("u.email='".$user->name."'");
			$rows = $q->execute();
			$cuenta = count($rows);
		}
		catch(Exception $e)
		{
			if($GLOBALS["debugMode"]) $this->validator->errors->addError(ErrorManager::CANIS_FATAL,$e->getMessage());
		}

		if($cuenta == 1)
		{
			$auxUser = $rows[0];
			//Si los hash de la clave coinciden
			if ($password == $auxUser->password)
			{
				$user->roleName   = $auxUser->Role->name;
				$user->locationId = $auxUser->Location->id;
				$user->status     = $auxUser->status;
				$user->id         = $auxUser->id;
			}
		}
		else
		{
			$user = new CocoasUser();
		}
		return $user;
	}

	public function loginUser()
	{
		$_SESSION["user"] = new CocoasUser();

		$user = $this->validator->getVar('user');
		$password = $this->validator->getVar('password');

		if ($password && $user)
		{
			//evito que haya colocado mas de una palabra en el login (para evitar sql injection)
			$usu = explode(" ",trim($user));

			//Guardo la identidad del cliente que desea autenticarse
			$_SESSION["user"]->name = $user;

			$_SESSION["user"] = $this->validate($_SESSION["user"],$password);
			//echo $_SESSION["usuario"]->roleId;
		}
	}

	public function closeSession()
	{
		$_SESSION["user"] = new CocoasUser();
		FOREACH($_COOKIE AS $key => $value) {
		     SETCOOKIE($key,$value,TIME()-10000);
		}
	}

	function exect($query)
	{
		$result = null;
		try
		{
			$result = mysql_query($query);
			if($GLOBALS["debugMode"]) if(!$result) $this->validator->errors->addError(ErrorManager::CANIS_FATAL,'No se ha podido realizar la accion: '.$query.' -> '.mysql_error());
		}
		catch(Exception $e)
		{
			$this->validator->errors->addError(ErrorManager::CANIS_FATAL,'No se ha podido realizar la accion: '.$e->getMessage());
		}
		
		return $result;
	}
	
}
?>