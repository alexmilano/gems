<?php

////////////////////////////////////////////////
// GLOBAL DEFINITIONS OF THE PROYECT          //
////////////////////////////////////////////////

/*--------THIS ARE THE MANDATORY DEFINITIONS----------*/

$GLOBALS["LOGIN_VIEW"]    = "login";
$GLOBALS["SIGNUP_VIEW"]   = "signup";
$GLOBALS["CHANGE_PASSWORD_VIEW"]   = "change-password";
$GLOBALS["PRIVATE_VIEW"]  = "panel-socio";
$GLOBALS["DEFAULT_VIEW"]  = "home";  //The logic name for the deault view that has to be showed in the start page
$GLOBALS["DEFAULT_PANEL"] = "panel-socio";
$GLOBALS["SUPERVISOR_VIEW"] = "panel-supervisor";
$GLOBALS["ADMIN_VIEW"] = "panel-admin";

$GLOBALS["DEFAULT_USER"] = "anonymus";

/*----SENDGRID CREDENTIALS----*/

$GLOBALS["SENGRID_USERNAME"] = "";
$GLOBALS["SENGRID_PASSWORD"] = "";

/*----END OF SENDGRID CREDENTIALS----*/
	
/*--------END OF THE MANDATORY DEFINITIONS----------*/


/*--------THIS ARE THE SECURITY DEFINITIONS----------*/

$GLOBALS["DEFAULT_ROLE"]    = "invalid";
$GLOBALS["DEFAULT_ROLE_ID"] = "1";
$GLOBALS["PENDING_VIEW"]    = "validate";

/*--------END OF THE MANDATORY DEFINITIONS----------*/
$GLOBALS["connectionName"] = "gems";
$GLOBALS["canisSessionName"] = "ejemploDeSession";

/*--------THIS ARE THE MYSQL CONECTION DEFINITIONS----------*/
//
$GLOBALS["dbServer"]   = "localhost";
$GLOBALS["dbName"]     = "gems";
$GLOBALS["dbUser"]     = "root";
$GLOBALS["dbPassword"] = "";

//$GLOBALS["dbServer"]   = "localhost";
//$GLOBALS["dbName"]     = "ivoted";
//$GLOBALS["dbUser"]     = "root";
//$GLOBALS["dbPassword"] = "zL3hFu8y";

/*--------END OF THE MYSQL CONECTION DEFINITIONS----------*/

/*--------THIS ARE THE OPTIONAL DEFINITIONS----------*/

//Here are the global var to edit the keywords, description and language metatags of the proyect

$GLOBALS["keywords"]    = "1,2,3,4,5";
$GLOBALS["description"] = "project base in polls";
$GLOBALS["language"]    = "spanish";

//for developing use, if you set this var to "true" errors and aditional information will be showed

$GLOBALS["showViewHierarchy"] = false;
$GLOBALS["showRoleHierarchy"] = false;
$GLOBALS["BDLazyMode"]        = false;

/*--------END OF THE OPTIONAL DEFINITIONS----------*/

/*--------THIS ARE THE ERROR REPORTING DEFINITIONS----------*/

$GLOBALS["debugMode"]  = true;
$GLOBALS["logErrors"]  = true;
$GLOBALS["mailErrors"] = false;

$GLOBALS["error_mailHost"]     = "mail.domain.com";
$GLOBALS["error_mailUserName"] = "user+domain.com";
$GLOBALS["error_mailPasswors"] = "password";
$GLOBALS["error_mailAccount"]  = "aalejo@gmail.com";

/*--------FRENDLY URL DEFINITIONS----------*/

$GLOBALS["frendlyURL"] = true;


$GLOBALS["baseURL"] = "http://localhost/gems/";

?>
