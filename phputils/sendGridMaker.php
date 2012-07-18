<?php 
class sendGridMaker{
	public function getSenGrid($value='')
	{
		$sendgrid = null;
		if (isset($GLOBALS["SENDGRID_USERNAME"]) && isset($GLOBALS["SENDGRID_PASSWORD"])) {
			$sendgrid = new SendGrid($GLOBALS["SENDGRID_USERNAME"], $GLOBALS["SENDGRID_PASSWORD"]);
		}
		return $sendgrid;
	}
}

?>