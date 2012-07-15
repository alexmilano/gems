
		<form action="crud.php" method="post">
			<input type="hidden" name="action" value="update" />
			<input type="hidden" name="view" value="update-venta" />
		<input type='hidden' name='id' value='<?php echo $vars["entity"]->id; ?>' />

<p><b>Profile Id</b></p>
	<input type='text' name='profile_id' value='<?php echo $vars["entity"]->profile_id; ?>' />

<p><b>Room</b></p>
	<input type='text' name='room' value='<?php echo $vars["entity"]->room; ?>' />

<p><b>Guest Name</b></p>
	<input type='text' name='guest_name' value='<?php echo $vars["entity"]->guest_name; ?>' />

<p><b>Arrival</b></p>
	<input type='text' name='arrival' value='<?php echo $vars["entity"]->arrival; ?>' />

<p><b>Departure</b></p>
	<input type='text' name='departure' value='<?php echo $vars["entity"]->departure; ?>' />

<p><b>Number Of Night</b></p>
	<input type='text' name='number_of_night' value='<?php echo $vars["entity"]->number_of_night; ?>' />

<p><b>Adults</b></p>
	<input type='text' name='adults' value='<?php echo $vars["entity"]->adults; ?>' />

<p><b>Rate Code</b></p>
	<input type='text' name='rate_code' value='<?php echo $vars["entity"]->rate_code; ?>' />

<p><b>Confirmation</b></p>
	<input type='text' name='confirmation' value='<?php echo $vars["entity"]->confirmation; ?>' />

<p><b>Code Socio</b></p>
	<input type='text' name='code_socio' value='<?php echo $vars["entity"]->code_socio; ?>' />

<input type="submit" name="submit" value="Save" />
		</form>