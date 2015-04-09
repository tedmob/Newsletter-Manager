<?php
	require_once("root.php");
	require_once($config['urls']['root']."config.php");
	require_once($config['urls']['root']."php/db.php");
	class lista{
		public function delete($id){
			$db = new db();
			return $db->query("DELETE FROM list WHERE id = $id");
		}
	}
?>