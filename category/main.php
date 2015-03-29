<?php
	require_once("root.php");
	require_once($config['urls']['root']."config.php");
	require_once($config['urls']['root']."php/db.php");
	class category{
		public function id2cat($id){
			$db = new db();
			$db->query("SELECT category FROM categories WHERE id_category=$id");
			$r = $db->fetch();
			return $r['category'];	
		}
		public function cat2id($nome){
			$db = new db();
			$db->query("SELECT id_category FROM categories WHERE category=$nome");
			$r = $db->fetch();
			return $r['id_category'];	
		}
	}
?>