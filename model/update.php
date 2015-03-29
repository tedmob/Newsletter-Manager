<?php
	require_once("root.php");
	require_once($config['urls']['root']."config.php");
	require_once($config['urls']['root']."model/main.php");
	//require_once("main.php");
	
	$m = new model();
	echo $m->update($_POST['id_model'],$_POST['model'],$_POST['subject'], $_POST['txt']);
?>