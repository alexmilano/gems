
		<?php

		class ventaDelegate
		{

			public function ventaDelegate()
			{

				return "";
			}

			function insert($validator)
			{
				$entity = new venta();
		$entity->profile_id=$validator->getVar("profile_id");
		$entity->room=$validator->getVar("room");
		$entity->guest_name=$validator->getVar("guest_name");
		$entity->arrival=$validator->getVar("arrival");
		$entity->departure=$validator->getVar("departure");
		$entity->number_of_night=$validator->getVar("number_of_night");
		$entity->adults=$validator->getVar("adults");
		$entity->rate_code=$validator->getVar("rate_code");
		$entity->rate_ammount=$validator->getVar("rate_ammount");
		$entity->rate_revenue=$validator->getVar("rate_revenue");
		$entity->confirmation=$validator->getVar("confirmation");
		$entity->code_socio=$validator->getVar("code_socio");
				$entity->save();

				return "controller.php?view=list-venta";
			}

			function update($validator)
			{
				$id = $validator->getVar("id");$record = Doctrine::getTable("venta")->find($id);
    	$record->profile_id=$validator->getVar("profile_id");
    	$record->room=$validator->getVar("room");
    	$record->guest_name=$validator->getVar("guest_name");
    	$record->arrival=$validator->getVar("arrival");
    	$record->departure=$validator->getVar("departure");
    	$record->number_of_night=$validator->getVar("number_of_night");
    	$record->adults=$validator->getVar("adults");
    	$record->rate_code=$validator->getVar("rate_code");
    	$record->rate_ammount=$validator->getVar("rate_ammount");
    	$record->rate_revenue=$validator->getVar("rate_revenue");
    	$record->confirmation=$validator->getVar("confirmation");
    	$record->code_socio=$validator->getVar("code_socio");
		    	$record->save();

				return "controller.php?view=list-venta&idventa=".$validator->getVar("id");
			}

			function delete($validator)
			{
				$id = $validator->getVar("id");

				$q = Doctrine_Query::create()->delete("venta a")->where("a.id = ".$id);
				$q->execute();

				return "controller.php?view=list-venta";
			}

			function listRecords($validator)
			{

				$q = Doctrine_Query::create()->from("venta");
				$records = $q->execute();

				return $records;
			}

			function getventa($validator)
			{
				$id = $validator->getVar("idventa");

				$records = Doctrine::getTable('venta')->find($id);

				return $records;
			}

		}

		?>
		