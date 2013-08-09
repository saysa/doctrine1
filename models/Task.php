<?php
class Task extends Doctrine_Record {
	
	public function setTableDefinition()
	{
		$this->setTableName("tasks");
		
		$this->hasColumn("task_id", "integer", 10, array('primary' => true, 'autoincrement' => true));
		$this->hasColumn("title", "string", 100);
		$this->hasColumn("description", "string", 255);
		$this->hasColumn("deadline", "datetime");
		$this->hasColumn("estimated_time", "string", 12);
		$this->hasColumn("status", "string", 20);
		$this->hasColumn("created_at", "timestamp");
		$this->hasColumn("updated_at", "timestamp");
		$this->hasColumn("project_id", "integer", 10);
		
	}
	
	public function setUp()
	{
		$this->hasOne('Project',
				array(
					'local' => 'task_id',
					'foreign' => 'project_id',				
		));
	}
}

?>