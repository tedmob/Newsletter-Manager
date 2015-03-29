<?php
	require_once("root.php");
	require_once($config['urls']['root']."config.php");
	require_once($config['urls']['root']."php/db.php");
	class user{
		public function get_table($page){
			$txt = "";
			$db = new db();
			
			$q  = "SELECT id_user, user, citta, birthday, c.category, email FROM users as u  ";
			$q .= "INNER JOIN categories as c ON id_category = u.category";
			
			$txt .= '<table class="table table-striped table-hover table-condensed">';
				$txt .= '<thead>';
					$txt .= '<th>Nome</th><th>Età</th><th>Attività</th><th>Email</th><th>Domicilio</th><th>Azioni</th>';
				$txt .= '</thead>';
				$txt .= '<tbody>';
					if($db->query($q)){
						while($r = $db->fetch()){
							$date = new DateTime($r['birthday']);
							$txt .= '<tr>';
								$txt .= '<td>'.$r['user'].'</td>';
								$txt .= '<td>'.$date->format('d/m/Y').'</td>';
								$txt .= '<td>'.$r['category'].'</td>';
								$txt .= '<td>'.$r['email'].'</td>';
								$txt .= '<td>'.$r['citta'].'</td>';								
								$txt .= '<td>';
									$txt .= '<span class="glyphicon glyphicon-trash" ';
									$txt .= 'onClick="user_delete('.$r['id_user'].')"></span>';
									$txt .= '<span class="glyphicon glyphicon-pencil" ';
									$txt .= 'onClick="user_update('.$r['id_user'].')"></span>';
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
		public function insert($user, $birthday, $category, $email, $citta){
			$db = new db();
			$query = "INSERT INTO users (user, birthday, category, citta, email) ";
			$query .="VALUES ('$user','$birthday','$category', '$citta', '$email')";
			if($db->query($query)){
				return "<result>TRUE</result>";
			}
			else{
				return "<result>FALSE</result><info>".$db->get_error()."</info>";	
			}
		}
		public function update($id_user, $user, $birthday, $category, $email, $citta){
			$db = new db();
			$query  = "UPDATE users SET user='$user', birthday='$birthday', category='$category', ";
			$query .= "citta='$citta', email='$email' WHERE id_user=$id_user";
			if($db->query($query)){
				return "<result>TRUE</result>";
			}
			else{
				return "<result>FALSE</result><info>".$db->get_error()."</info>";	
			}
		}
		public function delete($id_user){
			$db = new db();
			$query = "DELETE FROM users WHERE id_user=$id_user";
			if($db->query($query)){
				return "<result>TRUE</result>";
			}
			else{
				return "<result>FALSE</result><info>".$db->get_error()."</info>";	
			}
		}
	}
?>