<?php
//get_model_content.php
/*
* Creator: Alex Stabile
* Date: 30/03/015
*/

require_once("root.php");
require_once($config['urls']['root']."config.php");
require_once($config['urls']['root']."php/db.php");

$db = new db();
$id= $_POST['id'];
if($id){
	$db->query("SELECT text FROM models WHERE id_model=$id");
	$result = $db->fetch();
	echo html_entity_decode($result['text']);
}

?>