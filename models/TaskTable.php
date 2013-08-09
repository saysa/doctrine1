<?php
class TaskTable extends Doctrine_Table {
	
	public function getJointure()
	{
		$query = Doctrine_Query::create()
		->select('t.title', 'p.name')
		->from('Task t')
		->leftJoin('t.Project p')
		->execute();
		
		return $query;
	}
}