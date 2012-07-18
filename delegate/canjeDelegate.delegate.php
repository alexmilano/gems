
		<?php

		class canjeDelegate
		{

			public function canjeDelegate()
			{

				return "";
			}

			function insert($validator)
			{
				$entity = new canje();
				$entity->premio_id=$validator->getVar("premio_id");
				$entity->profile_id=$validator->getVar("profile_id");
				$entity->save();

				return "controller.php?view=list-canje";
			}

			function update($validator)
			{
				$id = $validator->getVar("id");$record = Doctrine::getTable("canje")->find($id);
    	$record->premio_id=$validator->getVar("premio_id");
    	$record->profile_id=$validator->getVar("profile_id");
		    	$record->save();

				return "controller.php?view=list-canje&idcanje=".$validator->getVar("id");
			}

			function delete($validator)
			{
				$id = $validator->getVar("id");

				$q = Doctrine_Query::create()->delete("canje a")->where("a.id = ".$id);
				$q->execute();

				return "controller.php?view=list-canje";
			}

			function listRecords($validator)
			{

				$q = Doctrine_Manager::getInstance()->connection();
				$result = $q->execute("SELECT s.empresa, s.revenue_total, c.id, s.socio, s.nombre as nombre_socio, s.puntos_disponibles, p.puntos, p.nombre, p.descripcion, c.status,c.nombre_cheque FROM canje as c, premio as p, profile as s WHERE p.id = c.premio_id  and c.status = '".$validator->getVar("status")."' and c.profile_id = s.id");
				

				return $result->fetchAll();;
			}
			
			function GetSocioCanjes($validator)
			{
				$q = Doctrine_Manager::getInstance()->connection();
				$result = $q->execute("SELECT p.puntos, p.nombre, p.descripcion, c.status FROM canje as c, premio as p WHERE p.id = c.premio_id and c.status = '".$validator->getVar("status")."' and c.profile_id =".$_SESSION['user']->socio);
				
				

				return $result->fetchAll();;
			}

			function getcanje($validator)
			{
				$id = $validator->getVar("idcanje");

				$records = Doctrine::getTable('canje')->find($id);

				return $records;
			}
			
			function ProcesarCanje($validator)
			{
				$id = $validator->getVar("idcanje");
				$ch = $validator->getVar("cheque");

				$cheque = Doctrine::getTable('cheque')->find($ch);

				
				$canje = Doctrine::getTable('canje')->find($id);
				$premio = Doctrine::getTable('premio')->find($canje->premio_id);
				$socio = Doctrine::getTable('profile')->find($canje->profile_id);
				if ($socio->puntos_disponibles >= $premio->puntos){
						$canje->status = "Aceptado";
						$canje->cheque = $cheque->id;
						$canje->nombre_cheque = $cheque->cheque;
						$aux_puntos = $socio->puntos_disponibles;
						$aux_revenue = $socio->revenue_disponibles;
						
						$socio->puntos_disponibles = $aux_puntos - $premio->puntos;
						$socio->revenue_disponibles = $aux_revenue - $premio->puntos;
						
						$canje->save();
						$socio->save();
				
				}
				return 'list-canje&status=Pendiente';
			}
			
			function GetCheques($validator)
			{

				$q = Doctrine_Query::create()->from("cheque");
				$records = $q->execute();

				return $records;
			}

		}

		?>
		