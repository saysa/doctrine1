<?php
class News extends Doctrine_Record
{
	public function setTableDefinition()
	{
		$this->setTableName('news');
		$this->hasColumn('id', 'integer', 8, array('primary' => true, 'autoincrement' => true));
		$this->hasColumn('titre', 'string', 100);
		$this->hasColumn('auteur', 'string', 100);
		$this->hasColumn('contenu', 'string', 4000);
	}
	
	public function setUp()
	{
		$this->hasMany(
				'Commentaire as commentaires',
				array(
						'local' => 'id',
						'foreign' => 'id_news'
		));
	}
}

class NewsTable extends Doctrine_Table
{
	public function getNews($nb)
	{
		$q = Doctrine_Query::create()
		->from('news')
		->orderBy('id DESC')
		->limit((int) $nb);

		return $q;
	}
	
}