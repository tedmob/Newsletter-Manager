<?php
	require_once("root.php");
	require_once($config['urls']['root']."config.php");
	require_once($config['urls']['root']."php/db.php");
	class log{
		public function add($id_user, $id_model, $msg){
			$db = new db();
			$db->query("INSERT INTO logs (user, model, msg) VALUES ($id_user, $id_model, '$msg')");
		}
		public function get_table(){
			$db = new db();
			$txt = "";			
			$q  = "SELECT u.email, m.model, msg, l.date FROM logs as l INNER JOIN users as u ON l.user=u.id_user ";
			$q .= "INNER JOIN models as m ON m.id_model=l.model";
			$txt .= '<table class="table table-striped table-hover table-condensed">';
				$txt .= '<thead>';
					$txt .= '<th>Email</th><th>Modello</th><th>Data</th><th>Esito</th>';
				$txt .= '</thead>';
				$txt .= '<tbody>';
					if($db->query($q)){
						while($r = $db->fetch()){
							$date = new DateTime($r['date']);
							$txt .= '<tr>';
								$txt .= '<td>'.$r['email'].'</td>';
								$txt .= '<td>'.$r['model'].'</td>';
								$txt .= '<td>'.$date->format('d/m/Y H:i').'</td>';
								$txt .= '<td>'.$r['msg'].'</td>';
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
	}
?>