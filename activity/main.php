<?php
	require_once("root.php");
	require_once($config['urls']['root']."config.php");
	require_once($config['urls']['root']."php/db.php");
	class activity{
		public function get_table(){
			$txt = "";
			$db = new db();
			
			$q  = "SELECT * FROM categories WHERE active=1";
			
			$txt .= '<table class="table table-striped table-hover table-condensed">';
				$txt .= '<thead>';
					$txt .= '<th>#</th><th>Attività</th><th>Altro</th>';
				$txt .= '</thead>';
				$txt .= '<tbody>';
					if($db->query($q)){
						$ind = 1;
						while($r = $db->fetch()){
							$txt .= '<tr>';
								$txt .= '<td>'.$ind.'</td>';
								$txt .= '<td>'.$r['category'].'</td>';
								$txt .= '<td>';
									$txt .= '<span class="glyphicon glyphicon-trash" ';
									$txt .= 'onClick="activity_delete('.$r['id_category'].')"></span>';
								$txt .= '</td>';
							$txt .= '</tr>';	
							$ind++;
						}
					}
					else{
						return "Errore>: ".$db->get_error();;	
					}
				$txt .= '</tbody>';
			$txt .= '</table>';
			return $txt;
		}
		public function insert($category){
			$db = new db();
			$query = "INSERT INTO categories (category) VALUES ('$category')";
			if($db->query($query)){
				return "<result>TRUE</result>";
			}
			else{
				return "<result>FALSE</result><info>".$db->get_error()."</info>";	
			}
		}
		public function delete($id){
			$db = new db();
			$query = "UPDATE categories SET active = 0 WHERE id_category=$id";
			if($db->query($query)){
				return "<result>TRUE</result>";
			}
			else{
				return "<result>FALSE</result><info>".$db->get_error()."</info>";	
			}
		}
	}
?>