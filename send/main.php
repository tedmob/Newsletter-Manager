<?php
	require_once("root.php");
	require_once($config['urls']['root']."config.php");
	require_once($config['urls']['root']."php/db.php");
	
	class send{
		public function filtra($user, $eta1, $eta2, $citta, $category){
				$db = new db();
				$query  = "SELECT id_user, birthday, citta, u.category as id_cat, c.category as cat, u.user, email ";
				$query .= "FROM users as u INNER JOIN categories as c ON u.category=c.id_category ";
				$query .= "WHERE (birthday BETWEEN (NOW() - INTERVAL $eta2 YEAR) AND (NOW() - INTERVAL $eta1 YEAR)) ";
				$query .= "AND (citta LIKE '%$citta%') AND (user LIKE '%$user%') ";
				if($category!=0){
					$query .= "AND (u.category= $category)";
				}
				if($db->query($query)){
					$txt = "<container>";
					while($r = $db->fetch()){
						$data = new DateTime($r['birthday']);
						$txt .= "<user>";
							$txt .= "<id>".$r['id_user']."</id>";
							$txt .= "<name>".$r['user']."</name>";
							$txt .= "<birthday>".$data->format("d/m/Y")."</birthday>";
							$txt .= "<category>".$r['cat']."</category>";
							$txt .= "<email>".$r['email']."</email>";
						$txt .= "</user>";	
					}
					return $txt."</container>";
				}
				else{
					return "<result>ERROR</result><info>".$db->get_error()."</info>";	
				}
		}
	}
?>