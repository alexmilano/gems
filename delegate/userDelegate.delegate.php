
		<?php

		class userDelegate
		{

			public function userDelegate()
			{

				return "";
			}

			function insert($validator)
			{
				$entity = new user();
		$entity->email=$validator->getVar("email");
		$entity->password=$validator->getVar("password");
		$entity->location_id=$validator->getVar("location_id");
		$entity->role_id=$validator->getVar("role_id");
		$entity->status=$validator->getVar("status");
		$entity->validation_code=$validator->getVar("validation_code");
				$entity->save();

				return "controller.php?view=list-user";
			}

			function update($validator)
			{
				$id = $validator->getVar("id");$record = Doctrine::getTable("user")->find($id);
    	$record->email=$validator->getVar("email");
    	$record->password=$validator->getVar("password");
    	$record->location_id=$validator->getVar("location_id");
    	$record->role_id=$validator->getVar("role_id");
    	$record->status=$validator->getVar("status");
    	$record->validation_code=$validator->getVar("validation_code");
		    	$record->save();

				return "controller.php?view=list-user&iduser=".$validator->getVar("id");
			}

			function delete($validator)
			{
				$id = $validator->getVar("id");

				$q = Doctrine_Query::create()->delete("user a")->where("a.id = ".$id);
				$q->execute();

				return "controller.php?view=list-user";
			}

			function listRecords($validator)
			{

				$q = Doctrine_Query::create()->from("user");
				$records = $q->execute();

				return $records;
			}

			function getuser($validator)
			{
				$id = $validator->getVar("iduser");

				$records = Doctrine::getTable('user')->find($id);

				return $records;
			}

		}

		?>
		