<?php
require_once("globals.php");
if($GLOBALS["debugMode"])
{
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
}
require_once("bootstrap.php");

require_once('manager/error.manager.php');
require_once("manager/task.manager.php");
session_name($GLOBALS["canisSessionName"]);
ini_set("session.gc_maxlifetime", "31449600");
session_start();

if (!$GLOBALS["debugMode"])
{
	error_reporting(E_ALL ^ E_NOTICE);
}

//$memcache = new Memcache;
//$memcache>connect('127.0.0.1', 11211) or die ("Could not connect");

//Empiezo la carga de la informacion dentro de las vistas

$tasManager = new TaskManager();

//---------------------------------------------------------------------
if (isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];
	switch($action)
	{
		case "next":
			
			if(isset($_REQUEST["queue"])) $tasManager->getNextTask($_REQUEST["queue"]);
			else $tasManager->getNextTask();
			
		break;
		case "clean":
			$tasManager->cleanAllTasks();
		break;
		case "collector":
			$tasManager->collectGarbage();
		break;
		default:
			if ($GLOBALS["debugMode"])
			{
				die("Task action '$action' not found.");
			}
			else
			{
				header("HTTP/1.0 404 Not Found");
			}
		break;
			
	}

}


?>
