<?php
	require_once("root.php");
	require_once($config['urls']['root']."config.php");
	require_once($config['urls']['root']."send/main.php");
	//require_once("main.php");
	
	$send = new send();
	echo $send->filtra($_POST['user'],$_POST['eta1'],$_POST['eta2'], $_POST['citta'], $_POST['category']);
?>