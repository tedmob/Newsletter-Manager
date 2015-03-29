<?php
	require_once("root.php");
	require_once($config['urls']['root']."config.php");
	require_once($config['urls']['root']."user/main.php");
	//require_once("main.php");
	
	$u = new user();
	echo $u->insert($_POST['user'],$_POST['birthday'], $_POST['category'], $_POST['email'], $_POST['citta']);
?>