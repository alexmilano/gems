<?php

require_once('phputils/canislogging.class.php');
require_once("phputils/mysqlConexion.php");
require_once("tasks/classes/TaskQueue.php");
require_once("tasks/classes/BaseTask.php");
require_once("phputils/mysqlConexion.php");

class TaskManager
{
	//PRIORITY TYPES
	const STANDARD = "standard";
	const HIGH = "high";
	
	//private $queues = array();
	private $logger;
	
	public function TaskManager()
	{
		$this->logger = new CanisLogging();
		
		//$this->queues[self::HIGH] = new TaskQueue();
		//$this->queues[self::STANDARD] = array();
	}
	
	public function addTask($type,$name,$params,$queue=null)
	{
		if($queue) $this->queues->validateQueueId($queue);
		else $queue = rand(1,TaskQueue::LIMIT);
		
		try
		{
			$task = new BaseTask($type,$name,$params,$queue);
			$task->save();//Guardo en BD
			
			//if(!$this->queues[self::STANDARD][$queue]) $this->queues[self::STANDARD][$queue] = new TaskQueue();
			//$this->queues[self::STANDARD][$queue]->addTask($task);//Guardo en Memoria
		}
		catch(Exception $e)
		{
			$this->logger->logToFile("tasks/logs/taks_manager.log","[SUCCESS] The task $name was added succesfully.");
			return -1;
		}
		
	}
	
	public function cleanAllTasks()
	{
		$result = mysql_query("DELETE FROM task_queue");
		$result = mysql_query("DELETE FROM task_control");
		//$this->queues = array();
		
		if($result)
		{
			$this->logger->logToFile("tasks/logs/taks_manager.log","[SUCCESS] All tasks where deleted form all queues sucesfully.");				
			return 0;
		}
		else
		{
			$this->logger->logToFile("tasks/logs/taks_manager.log","[ERROR] There was a problem deleting tasks queues.");	
			return -1;
		}
	}
	
	public function cleanQueueTasks($queueId)
	{
		$result = mysql_query("DELETE FROM task_queue WHERE queue_id='$queueId'");
		$this->queues[self::STANDARD][$queueId]->clear();
		
		if($result)
		{
			$this->logger->logToFile("tasks/logs/taks_manager.log","[SUCCESS] All tasks where deleted form de queue $queueId.");				
			return 0;
		}
		else
		{
			$this->logger->logToFile("tasks/logs/taks_manager.log","[ERROR] There was a problem deleting tasks from queue $queueId.");	
			return -1;
		}
	}
	
	public function getNextTask($queue=null)
	{
		if($queue) $query = "SELECT id,name,json_params,type_priority FROM task_queue WHERE queue_id='$queue' AND type_priority='".self::STANDARD."'";
		else $query = "SELECT id,name,json_params,type_priority FROM task_queue WHERE type_priority='".self::STANDARD."'";
		
		$result = mysql_query($query);
		if(0 < mysql_num_rows($result))
			if($object = mysql_fetch_object($result))
			{
				try
				{
					$this->executeTask($object->id,$object->type_priority,$object->name,$object->json_params,$queue);
					//echo "execute";
					$result = mysql_query("DELETE FROM task_queue WHERE id=".$object->id);
					if($result)
					{
						
	    				$this->logger->logToFile("tasks/logs/".$object->name.".log","[SUCCESS] $object->id The task was executed sucesfully.");
						return true;	
					} 
					else
					{
						$result = mysql_query("INSERT INTO task_control (task_id, description, status) VALUES ($object->id,'The task would be deleted soon', 'delete')");
						$this->logger->logToFile("tasks/logs/".$object->name.".log","[WARNING] $object->id The task was executed but not deleted.");
						return false;
					}				
				}
				catch(Exception $e)
				{
					$result = mysql_query("INSERT INTO task_control (task_id, description) VALUES ('".$object->id."','".$e->getMessage()."')");
					$this->logger->logToFile("tasks/logs/".$object->name.".log","[ERROR] ".$object->id." ".$e->getMessage());
					return false;
				}
			}
			echo "No more taks to execute on this $queue queue.";
			
		return false;
	}
	
	public function getNextImportantTask()
	{
		$result = mysql_query("SELECT id,name,json_params,type_priority FROM task_queue WHERE type_priority='".self::HIGH."'");
		
		if(0 < mysql_num_rows($result))
			if($object = mysql_fetch_object($result))
			{
				try
				{
					$this->executeTask($object->type_priority,$object->name,$object->json_params);
					$result = mysql_query("DELETE FROM task_queue WHERE id=".$object->id);
					if($result)
					{
						
	    				$this->logger->logToFile("tasks/logs/".$object->name.".log","[SUCCESS] $object->id The task was executed sucesfully.");
						return true;	
					} 
					else
					{
						$result = mysql_query("INSERT INTO task_control (task_id, description, status) VALUES ($object->id,'The task would be deleted soon', 'delete')");
						$this->logger->logToFile("tasks/logs/".$object->name.".log","[WARNING] $object->id The task was executed but not deleted.");
						return false;
					}				
				}
				catch(Exception $e)
				{
					$result = mysql_query("INSERT INTO task_control (task_id, description) VALUES ('$object->id','".$e->getMessage()."')");
					$this->logger->logToFile("tasks/logs/".$object->name.".log","[ERROR] ".$object->id." ".$e->getMessage());
					return false;
				}
			}
			
		return false;
	}
	
	public function executeTask($id,$priority,$name,$params,$queue)
	{
		if (file_exists('tasks/'.$name.'.task.php'))
		{
			require('tasks/'.$name.'.task.php');
			$params = json_decode($params,true);
			$task = new Task($priority,$name,$params,$queue);
			$task->id = $id;
			$task->execute($params);
		}
		else throw new Exception('Task file '.$name.'.tasks.php not found.');

	}
	
	public function collectGarbage()
	{
		//Borro todas las tareas que han sido mandadas a borrar
		$result1 = mysql_query("DELETE FROM task_queue WHERE EXISTS (SELECT task_control.task_id=task_queue.id FROM task_control WHERE status='delete')");
		$result2 = mysql_query("DELETE FROM task_control WHERE status='delete' GROUP BY task_id");
		$this->logger->logToFile("tasks/logs/task_manager.log","[DELETION] All status='deleted' tasks where finelly deleted.");

		//borro todas las tareas que tengan mas de 3 intentos de ejecucion
		$result3 = mysql_query('SELECT COUNT(task_id) as total,task_id as taskId FROM task_control WHERE status="retry" GROUP BY task_id HAVING total>2') or die(mysql_error());
		while($row = mysql_fetch_row($result3))
		{
			$result = mysql_query("DELETE FROM task_queue WHERE id='".$row[1]."'");
			$result = mysql_query("DELETE FROM task_control WHERE task_id='".$row[1]."'");
			$this->logger->logToFile("tasks/logs/task_manager.log","[DELETION] The task #".$row[1]." was deleted from the queue after 3 fail attemps of execution.");
		}
	}
	
}

?>