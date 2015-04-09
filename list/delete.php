<?php

	require_once("root.php");
	require_once($config['urls']['root']."config.php");
	require_once($config['urls']['root']."list/main.php");

	$l = new lista();
	echo $l->delete($_POST['id']);

?>