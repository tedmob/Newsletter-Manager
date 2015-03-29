<?php
	require_once("root.php");
	require_once($config['urls']['root']."php/db.php");
	
	$txt = file_get_contents("emails2.txt");
	$txt = explode("\n", $txt);
	
	$db = new db();
	
	foreach($txt as $t){
		if(!$db->query("INSERT INTO users (user, category, email) VALUES ('Senza nome', 3, '$t')"))
			echo $t."  Error: ".$db->get_error()."<br>";
	}
?>
			