<?php
	require_once("root.php");
	require_once($config['urls']['root']."config.php");
	require_once($config['urls']['root']."user/main.php");
	//require_once("main.php");
	
	$u = new user();
	echo $u->delete($_POST['id_user']);
?>