<?php
	require_once("root.php");
	require_once($config['urls']['root']."config.php");
	require_once($config['urls']['root']."php/db.php");
	class model{
		public function get_table(){
			$txt = "";
			$db = new db();
			
			$q  = "SELECT id_model, date, model, subject FROM models WHERE active=1";
			
			$txt .= '<table class="table table-striped table-hover table-condensed">';
				$txt .= '<thead>';
					$txt .= '<th>Nome</th><th>Data</th><th>Subject</th><th>Altro</th>';
				$txt .= '</thead>';
				$txt .= '<tbody>';
					if($db->query($q)){
						while($r = $db->fetch()){
							$date = new DateTime($r['date']);
							$txt .= '<tr>';
								$txt .= '<td>'.$r['model'].'</td>';
								$txt .= '<td>'.$date->format('d/m/Y').'</td>';
								$txt .= '<td>'.$r['subject'].'</td>';
								$txt .= '<td>';
									$txt .= '<span class="glyphicon glyphicon-trash" ';
									$txt .= 'onClick="model_delete('.$r['id_model'].')"></span>';
									$txt .= '<span class="glyphicon glyphicon-pencil" ';
									$txt .= 'onClick="model_update('.$r['id_model'].')"></span>';
								$txt .= '</td>';
							$txt .= '</tr>';	
						}
					}
					else{
						return "Errore>: ".$db->get_error();;	
					}
				$txt .= '</tbody>';
			$txt .= '</table>';
			return $txt;
		}
		public function insert($model, $subject, $txt){
			$db = new db();
			$query = "INSERT INTO models (model, subject, text) ";
			$query.= "VALUES (\"".htmlentities($model)."\",\"".htmlentities($subject)."\",\"".htmlentities($txt)."\")";
			if($db->query($query)){
				return "<result>TRUE</result>";
			}
			else{
				return "<result>FALSE</result><info>".$db->get_error()."</info>";
			}
		}
		public function update($id_model,$model, $subject, $txt){
			$db = new db();
			$query = "UPDATE models SET model=\"".htmlentities($model)."\", subject=\"".htmlentities($subject)."\", ";
			$query.= "text=\"".htmlentities($txt)."\" WHERE id_model=".$id_model;
			if($db->query($query)){
				return "<result>TRUE</result>";
			}
			else{
				return "<result>FALSE</result><info>".$db->get_error()."</info>";	
			}
		}
		public function delete($id_model){
			$db = new db();
			$query = "UPDATE models SET active = 0 WHERE id_model=$id_model";
			if($db->query($query)){
				return "<result>TRUE</result>";
			}
			else{
				return "<result>FALSE</result><info>".$db->get_error()."</info>";	
			}
		}
	}
?>