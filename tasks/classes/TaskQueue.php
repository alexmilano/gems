<?php

class TaskQueue
{
	const LIMIT = 4;
	const FREE_STATUS = "free";
	const OCCUPIED_STATUS = "occupade";
	
	private $_tasks = array();
	private $_id = 0;
	
	private $status = self::FREE_STATUS;
	
	public function TaskQueue()
	{
		
	}
	
	public function validateQueueId($number)
	{
		if(self::LIMIT<$number || $number<1)
			throw Exception('Invalid queue number');
	}
	
	public function addTask($task)
	{
		array_push($this->_tasks,$task);
	}
	
	public function getTask($task)
	{
		return array_shift($this->_tasks);
	}
	
	public function clear()
	{
		$this->_taks = array();
	}

}

?>