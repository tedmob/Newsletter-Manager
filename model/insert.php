<?php
	require_once("root.php");
	require_once($config['urls']['root']."config.php");
	require_once($config['urls']['root']."model/main.php");
	//require_once("main.php");
	
	$model = new model();
	echo $model->insert($_POST['model'],$_POST['subject'],$_POST['txt']);
?>