
		<?php

		class premioDelegate
		{

			public function premioDelegate()
			{

				return "";
			}

			function insert($validator)
			{
				$entity = new premio();
				
				$entity->nombre=$validator->getVar("nombre");
				$entity->puntos=$validator->getVar("puntos");
				$entity->fecha_inicio=date('Y-m-d',strtotime(preg_replace('#/#','-',$validator->getVar("fecha_inicio"))));
				$entity->fecha_fin=date('Y-m-d',strtotime(preg_replace('#/#','-',$validator->getVar("fecha_fin"))));
				$entity->tipo=$validator->getVar("tipo");
				$entity->descripcion=$validator->getVar("descripcion");
				$entity->save();

				return "controller.php?view=list-premio";
			}

			function update($validator)
			{
				$id = $validator->getVar("id");$record = Doctrine::getTable("premio")->find($id);
		    	$record->nombre=$validator->getVar("nombre");
		    	$record->puntos=$validator->getVar("puntos");
				$record->fecha_inicio=date('Y-m-d',strtotime(preg_replace('#/#','-',$validator->getVar("fecha_inicio"))));
				$record->fecha_fin=date('Y-m-d',strtotime(preg_replace('#/#','-',$validator->getVar("fecha_fin"))));
		    	$record->tipo=$validator->getVar("tipo");
		    	$record->descripcion=$validator->getVar("descripcion");
		    	$record->save();

				return "controller.php?view=list-premio&idpremio=".$validator->getVar("id");
			}
			function GetPremiosDisponibles($validator)
			{
				$q = Doctrine_Query::create()->from("premio p")->where("p.tipo = " . $_SESSION['user']->tipo)->andWhere("p.puntos <=" . $_SESSION['user']->creditos );
				$records = $q->execute();

				return $records;
				
			}
			
			function Canjear($validator)
			{
				
				$id = $validator->getVar("idpremio");

				$premio = Doctrine::getTable('premio')->find($id);
				$canje = new Canje();
				$canje->premio_id = $id;
				$canje->profile_id = $_SESSION['user']->socio_id;
				$canje->status = "Pendiente";
				$canje->save();
				return 'mis-canjes';
				
			}
			
			function delete($validator)
			{
				$id = $validator->getVar("id");

				$q = Doctrine_Query::create()->delete("premio a")->where("a.id = ".$id);
				$q->execute();

				return "controller.php?view=list-premio";
			}

			function listRecords($validator)
			{

				$q = Doctrine_Query::create()->from("premio");
				$records = $q->execute();

				return $records;
			}

			function getpremio($validator)
			{
				$id = $validator->getVar("idpremio");

				$records = Doctrine::getTable('premio')->find($id);

				return $records;
			}
			
			function getTipos($validator)
			{

				$q = Doctrine_Query::create()->from("tipo");
				$records = $q->execute();

				return $records;
			}

		}

		?>
		