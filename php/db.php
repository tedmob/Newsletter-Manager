<?php
/* 
*	Created by Stabile Alex
*	Date: 11/06/2014 20:49
*	Classe di gestione generale del database MySql
*/
require_once("root.php");

class db{
		public $handler = NULL;
		public  $result = NULL;
		public function connect(){
			global $config;	
			$this->handler = 
				new mysqli($config['db']['host'], $config['db']['username'], $config['db']['password'], $config['db']['name']);
			if($this->handler->connect_error){
				die("Errore SQL: ".$this->handler->connect_error);	
			}
			else{
				$this->is_connect =  TRUE;
				return TRUE;
			}
		}
		public function disconnect(){
			$this->handler->close();
		}
		public function __construct(){
			 $this->connect();
		}
		public function fetch(){
			return $this->result->fetch_array(MYSQLI_ASSOC);
		}
		public function num_rows(){
			return $this->result->num_rows;
		}
		public function query($text){
			/*if($this->result = $this->handler->query($text)){
				return $this->result;	
			}
			else{
				die("Errore query: ".$this->handler->error);
			}	*/
			$this->result = $this->handler->query($text);
			return $this->result;
		}
		public function get_error(){
			return $this->handler->error;
		}
		public function id_insert(){
			return $this->handler->insert_id;	
		}
	}
?>