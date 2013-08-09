<?php

class Commentaire extends Doctrine_Record
{
	public function setTableDefinition()
	{
		$this->setTableName('commentaires');
		$this->hasColumn('id', 'integer', 8, array('primary' => true, 'autoincrement' => true));
		$this->hasColumn('id_news', 'integer', 8);
		$this->hasColumn('contenu', 'string', 4000);
	}
	
	public function setUp()
	{
		$this->hasOne(
				'News as news',
				array(
					'local' => 'id_news',
					'foreign' => 'id',				
		));
	}
}