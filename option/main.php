<?php
	require_once("root.php");
	require_once($config['urls']['root']."config.php");
	require_once($config['urls']['root']."php/db.php");
	
	class option{
		public $max_daily_email;
		public $smtp_host;
		public $smtp_user;
		public $smtp_password;
		public $smtp_port;
		public $smtp_name;
		public $smtp_email;
		
		public function update($max_msg, $smtp_host,$smtp_user,$smtp_pass, $smtp_port,$name, $email){
			$db = new db();
			$query  = "UPDATE options SET value='$max_msg' WHERE name='max_daily_email'";
			$db->query($query);
			$query  = "UPDATE options SET value='$smtp_host' WHERE name='smtp_host'";
			$db->query($query);
			$query  = "UPDATE options SET value='$smtp_user' WHERE name='smtp_user'";
			$db->query($query);
			$query  = "UPDATE options SET value='$smtp_pass' WHERE name='smtp_password'";
			$db->query($query);
			$query  = "UPDATE options SET value='$smtp_port' WHERE name='smtp_port'";
			$db->query($query);
			$query  = "UPDATE options SET value='$name' WHERE name='smtp_name'";
			$db->query($query);
			$query  = "UPDATE options SET value='$email' WHERE name='smtp_email'";
			$db->query($query);
		}
		 public function __construct(){
			$db = new db();
			$db->query("SELECT * FROM options WHERE name='max_daily_email'");
			$r = $db->fetch(); 
			$this->max_daily_email = $r['value'];
			
			$db->query("SELECT * FROM options WHERE name='smtp_host'");
			$r = $db->fetch(); 
			$this->smtp_host = $r['value'];
			
			$db->query("SELECT * FROM options WHERE name='smtp_user'");
			$r = $db->fetch(); 
			$this->smtp_user = $r['value'];
			
			$db->query("SELECT * FROM options WHERE name='smtp_password'");
			$r = $db->fetch(); 
			$this->smtp_password = $r['value'];
			
			$db->query("SELECT * FROM options WHERE name='smtp_port'");
			$r = $db->fetch(); 
			$this->smtp_port = $r['value'];
			
			$db->query("SELECT * FROM options WHERE name='smtp_name'");
			$r = $db->fetch(); 
			$this->smtp_name = $r['value'];
			
			$db->query("SELECT * FROM options WHERE name='smtp_email'");
			$r = $db->fetch(); 
			$this->smtp_email = $r['value'];
		 }
	}
?>