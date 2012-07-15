
		<?php

		class chequeDelegate
		{

			public function chequeDelegate()
			{

				return "";
			}

			function insert($validator)
			{
				$entity = new cheque();
		$entity->nombre=$validator->getVar("nombre");
		$entity->cheque=$validator->getVar("cheque");
				$entity->save();

				return "controller.php?view=list-cheque";
			}

			function update($validator)
			{
				$id = $validator->getVar("id");$record = Doctrine::getTable("cheque")->find($id);
    	$record->nombre=$validator->getVar("nombre");
    	$record->cheque=$validator->getVar("cheque");
		    	$record->save();

				return "controller.php?view=list-cheque&idcheque=".$validator->getVar("id");
			}

			function delete($validator)
			{
				$id = $validator->getVar("id");

				$q = Doctrine_Query::create()->delete("cheque a")->where("a.id = ".$id);
				$q->execute();

				return "controller.php?view=list-cheque";
			}

			function listRecords($validator)
			{

				$q = Doctrine_Query::create()->from("cheque");
				$records = $q->execute();

				return $records;
			}

			function getcheque($validator)
			{
				$id = $validator->getVar("idcheque");

				$records = Doctrine::getTable('cheque')->find($id);

				return $records;
			}

		}

		?>
		