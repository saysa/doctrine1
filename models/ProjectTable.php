<?php
class ProjectTable extends Doctrine_Table {
	
	public function getLast($nb)
	{
		$query = Doctrine_Query::create()
		->from('Project')
		->orderBy('project_id DESC')
		->limit((int) $nb)
		->execute();
		
		return $query;
	}
	
	public function getLimit($nb)
	{
		$query = Doctrine_Query::create()
		->from('Project')
		->limit(2)
		->execute();
		
		return $query;
	}
}
