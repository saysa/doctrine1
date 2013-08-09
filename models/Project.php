<?php


class Project extends Doctrine_Record {
	
	public function setTableDefinition()
	{
		$this->setTableName("projects");
		
		$this->hasColumn("project_id", "integer", 10, array('primary' => true, 'autoincrement' => true));
		$this->hasColumn("name", "string", 100);
		$this->hasColumn("description", "string", 4000);
	}
	
	public function setUp()
	{
		$this->hasMany(
				'Task',
				array(
						'local' => 'project_id',
						'foreign' => 'task_id'
		));
	}
}

?>