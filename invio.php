<!doctype html>
<html>
    <head>
    	<?php
			require_once("root.php");
			require_once($config['urls']['root']."php/db.php");
			require_once($config['urls']['root']."resource/header.php");
			require_once($config['urls']['root']."option/main.php");
			require_once($config['urls']['root']."log/main.php");
			require_once($config['urls']['root']."resource/phpmailer/PHPMailerAutoload.php");
		?>
        <meta charset="utf-8">
        <title>Newsletter Manager</title>
    </head>
    <body>
        <?php require_once($config['urls']['root']."resource/navbar.php"); ?>
        <div class="container">
        	<div class="page-header">
            	<div class="jumbotron">
                  <h1>Invio delle email</h1>
                </div>
            </div>
			<?php
				$option = new option();
				$log = new log();
				$mail = new PHPMailer();
				$mail->CharSet = 'UTF-8';
				/*$mail->isSMTP();
				$mail->Host = $option->smtp_host;
				$mail->SMTPAuth = true;
				$mail->Username = $option->smtp_user;
				$mail->Password = $option->smtp_password;
				$mail->SMTPSecure = 'tls';
				$mail->Port = $option->smtp_port;*/
				$mail->From = $option->smtp_name;
				$mail->FromName = $option->smtp_email;
				$mail->isHTML(true);
				$db = new db();
				$query  = "SELECT l.id, l.user as id_u, l.model as id_m, u.user, u.email, m.model, m.text, ";
				$query .= "m.subject FROM list as l INNER JOIN users as u ON l.user= u.id_user ";
				$query .= "INNER JOIN models as m ON l.model=m.id_model LIMIT ".$option->max_daily_email;
				$db->query($query);
				$txt = '<table class="table table-striped table-hover table-condensed">';
				$txt .= "<thead>";
					$txt .= "<th>Utente</th>";
					$txt .= "<th>Email</th>";
					$txt .= "<th>Modello</th>";
					$txt .= "<th>Esito</th>";
				$txt .= "</thead>";
				$txt .= "<tbody>";
					while($r = $db->fetch()){
						$mail->ClearAddresses();
						$txt .= "<tr>";
							$txt .= "<td>".$r['user']."</td>";
							$txt .= "<td>".$r['email']."</td>";
							$txt .= "<td>".$r['model']."</td>";
							$txt .= "<td>".sendMail($r['email'], $r['subject'], $r['text'], $r['id'], $r['id_u'], $r['id_m'])."</td>";
						$txt .= "</tr>";
					}
				$txt .= "</tbody>";
				$txt .= "</table>";
				echo $txt;
				
				function sendMail($email, $subject, $body, $id_list, $id_user, $id_model){
					global $log;
					global $mail;
					$mail->addAddress($email);
					$mail->Subject = $subject;
					$mail->Body = html_entity_decode($body);
					if($mail->send()){
						$db = new db();
						$db->query("DELETE FROM list WHERE id=$id_list");
						$log->add($id_user, $id_model, "Inviato");
						return "OK";	
					}
					else{
						$log->add($id_user, $id_model, $mail->ErrorInfo);
						return $mail->ErrorInfo;	
					}
				}
			?>
        </div>
    </body>
</html>