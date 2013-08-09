<!DOCTYPE html>
<<html>
<head>
	<title>Doctrine 1</title>
	<meta charset="UTF-8">
</head>
</html>
<?php
require_once 'lib/Doctrine.php';
spl_autoload_register(array('Doctrine_Core', 'autoload'));
require_once 'models/Project.php';
require_once 'models/Task.php';
require_once 'models/ProjectTable.php';
require_once 'models/TaskTable.php';
require_once 'modeles/News.class.php';
require_once 'modeles/Commentaire.class.php';
//require_once 'modeles/NewsTable.class.php';

$dsn = 'mysql://root@localhost/ares';
$doctrine = Doctrine_Manager::connection($dsn);

try {
	
	// create un new project and save
	$p = new Project();
	$p->name = "Poulain";
	$p->description = "Le lapin blanc";
	//$p->save();
	
	
	echo "<p>-----------</p>";
	
	// get all from project
	$table = Doctrine_Core::getTable('Project');
	$requete = $table->findAll();
	foreach($requete as $p)
	{
		echo $p->name.'<br />';
	}
	
	echo "<p>-----------</p>";
	
	// get one from project
	$p = $table->find(7);
	$p->description = "C'est un peureux éléphant";
	$p->save();
	
	echo "<p>---- Mode Controller -----</p>";
	$table = Doctrine_Core::getTable('Project');
	foreach ($table->getLast(3) as $p)
	{
		var_dump($p->project_id, $p->name);
	}
	
	echo "<p>---- Mode Controller 2 -----</p>";
	$table = Doctrine_Core::getTable('Project');
	foreach ($table->getLimit(2) as $p)
	{
		var_dump($p->project_id, $p->name);
	}
	
	echo "<p>---- Mode Controller 3 -----</p>";
	$table = Doctrine_Core::getTable('Task');
	foreach ($table->getJointure() as $t)
	{
		var_dump($t->title, $t->Project->name);
	}
	
	
} catch (Doctrine_Record_UnknownPropertyException $e) {
	echo $e->getMessage();
	
} catch(Doctrine_Connection_Exception $e) { 
	echo $e->getMessage(); 
}

