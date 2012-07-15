
		<?php

		class tipoDelegate
		{

			public function tipoDelegate()
			{

				return "";
			}

			function insert($validator)
			{
				$entity = new tipo();
				$entity->nombre=$validator->getVar("nombre");
				$entity->minimo=$validator->getVar("minimo");
				$entity->maximo=$validator->getVar("maximo");
				$entity->save();

				return "controller.php?view=list-tipo";
			}

			function update($validator)
			{
				$id = $validator->getVar("id");$record = Doctrine::getTable("tipo")->find($id);
    	$record->nombre=$validator->getVar("nombre");
    	$record->minimo=$validator->getVar("minimo");
    	$record->maximo=$validator->getVar("maximo");
		    	$record->save();

				return "controller.php?view=list-tipo&idtipo=".$validator->getVar("id");
			}

			function delete($validator)
			{
				$id = $validator->getVar("id");

				$q = Doctrine_Query::create()->delete("tipo a")->where("a.id = ".$id);
				$q->execute();

				return "controller.php?view=list-tipo";
			}

			function listRecords($validator)
			{

				$q = Doctrine_Query::create()->from("tipo");
				$records = $q->execute();

				return $records;
			}

			function gettipo($validator)
			{
				$id = $validator->getVar("idtipo");

				$records = Doctrine::getTable('tipo')->find($id);

				return $records;
			}

		}

		?>
		