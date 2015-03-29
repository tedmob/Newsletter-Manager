<?php
	require_once("root.php");
	require_once($config['urls']['root']."config.php");
	require_once($config['urls']['root']."activity/main.php");
	//require_once("main.php");
	
	$a = new activity();
	echo $a->delete($_POST['id']);
?>