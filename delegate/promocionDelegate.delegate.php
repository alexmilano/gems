
		<?php

		class promocionDelegate
		{

			public function promocionDelegate()
			{

				return "";
			}

			function insert($validator)
			{
				$entity = new promocion();
				$entity->nombre=$validator->getVar("nombre");
				$entity->porcentaje=$validator->getVar("porcentaje");
				$entity->fecha_inicio=date('Y-m-d',strtotime(preg_replace('#/#','-',$validator->getVar("fecha_inicio"))));
				$entity->fecha_fin=date('Y-m-d',strtotime(preg_replace('#/#','-',$validator->getVar("fecha_fin"))));
				$entity->save();

				return "controller.php?view=list-promocion";
			}

			function update($validator)
			{
				$id = $validator->getVar("id");$record = Doctrine::getTable("promocion")->find($id);
    	$record->nombre=$validator->getVar("nombre");
    	$record->porcentaje=$validator->getVar("porcentaje");
    	$record->fecha_inicio=$validator->getVar("fecha_inicio");
    	$record->fecha_fin=$validator->getVar("fecha_fin");
		    	$record->save();

				return "controller.php?view=list-promocion&idpromocion=".$validator->getVar("id");
			}

			function delete($validator)
			{
				$id = $validator->getVar("id");

				$q = Doctrine_Query::create()->delete("promocion a")->where("a.id = ".$id);
				$q->execute();

				return "controller.php?view=list-promocion";
			}

			function listRecords($validator)
			{

				$q = Doctrine_Query::create()->from("promocion");
				$records = $q->execute();

				return $records;
			}

			function getpromocion($validator)
			{
				$id = $validator->getVar("idpromocion");

				$records = Doctrine::getTable('promocion')->find($id);

				return $records;
			}

		}

		?>
		