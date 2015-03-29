<?php
	require_once("root.php");
	require_once($config['urls']['root']."config.php");
	require_once($config['urls']['root']."php/db.php");
	
	$txt = file_get_contents("e.txt");
	
	$txt = explode("?()", $txt);
	
	$db = new db();
	foreach($txt as $t){
		$db->query("INSERT INTO utenti (user, category, email) VALUES ('Senza nome', 3, '".$t."')");
	}
?>