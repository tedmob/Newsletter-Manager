<?php
	require_once("root.php");
	require_once($config['urls']['root']."config.php");
	require_once($config['urls']['root']."php/db.php");
	require_once($config['urls']['root']."option/main.php");
	
	$option = new option();
	
	$option->update($_POST['max_msg'], $_POST['smtp_host'], $_POST['smtp_user'], $_POST['smtp_pass'], $_POST['smtp_port'], $_POST['smtp_name'], $_POST['smtp_email']);
	
	echo "<result>SUCCESS</result>";

?>