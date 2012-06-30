<?php

class BaseTask
{
	
	private $queueId;
	private $params = array();
	private $priority;
	private $name;
	private $id;
	
	private $logger;
	
	
	public function BaseTask($priority,$name,$params,$queueId=null)
	{
		$this->params = $params;
		$this->priority = $priority;
		$this->name = $name;
		$this->queueId = $queueId;
		
		$this->logger = new CanisLogging();
	}
	
	public function setQueue($id)
	{
		$this->queueId = $id;
	}
	
	public function getQueue()
	{
		return $this->queueId;
	}
	
	public function save()
	{
		$jsonParams = json_encode($this->params);
		$result = mysql_query("INSERT INTO task_queue (type_priority,name,json_params,queue_id) VALUES ('$this->priority','$this->name','$jsonParams','$this->queueId')");
		
		if($result)
		{
			$this->id = mysql_insert_id();
			$this->logger->logToFile("tasks/logs/".$this->name.".log","[SUCCESS] The task was queued sucesfully.");	
		}
		$this->logger->logToFile("tasks/logs/".$this->name.".log","[ERROR] There was a error saving the task to Database.");	
		
	}
		

}

?>