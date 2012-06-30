
		<?php

		class profileDelegate
		{

			public function profileDelegate()
			{

				return "";
			}

			function insert($validator)
			{
				$entity = new profile();
		$entity->socio=$validator->getVar("socio");
		$entity->nombre=$validator->getVar("nombre");
		$entity->fecha_nacimiento=$validator->getVar("fecha_nacimiento");
		$entity->empresa=$validator->getVar("empresa");
		$entity->cargo=$validator->getVar("cargo");
		$entity->telefono=$validator->getVar("telefono");
		$entity->celular=$validator->getVar("celular");
		$entity->fax=$validator->getVar("fax");
		$entity->email=$validator->getVar("email");
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
		$entity->supervisor=$validator->getVar("supervisor");
		$entity->fecha_inscripcion=$validator->getVar("fecha_inscripcion");
		$entity->user_id=$validator->getVar("user_id");
				$entity->save();

				return "controller.php?view=list-profile";
			}

			function update($validator)
			{
				$id = $validator->getVar("id");$record = Doctrine::getTable("profile")->find($id);
    	$record->socio=$validator->getVar("socio");
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
		    	$record->save();

				return "controller.php?view=list-profile&idprofile=".$validator->getVar("id");
			}

			function delete($validator)
			{
				$id = $validator->getVar("id");

				$q = Doctrine_Query::create()->delete("profile a")->where("a.id = ".$id);
				$q->execute();

				return "controller.php?view=list-profile";
			}

			function listRecords($validator)
			{

				$q = Doctrine_Query::create()->from("profile");
				$records = $q->execute();

				return $records;
			}

			function getprofile($validator)
			{
				$id = $validator->getVar("idprofile");

				$records = Doctrine::getTable('profile')->find($id);

				return $records;
			}

		}

		?>
		