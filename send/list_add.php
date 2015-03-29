<?php
	require_once("root.php");
	require_once($config['urls']['root']."config.php");
	require_once($config['urls']['root']."php/db.php");
	
	$db = new db();
	
	$id_model = $_POST['model'];
	$id_user  = $_POST['user'];
	
	if($db->query("INSERT INTO list (model, user) VALUES ($id_model, $id_user)")){
		echo "<result>TRUE</result>";	
	}
	else{
		echo "<result>FALSE</result>";	
	}
?>