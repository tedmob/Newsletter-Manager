<!doctype html>
<html>
    <head>
    	<?php
			require_once("root.php");
			require_once($config['urls']['root']."php/db.php");
			require_once($config['urls']['root']."resource/header.php");
		?>
        <meta charset="utf-8">
        <title>Newsletter Manager</title>
    </head>
    <body>
        <?php require_once($config['urls']['root']."resource/navbar.php"); ?>
        <div class="container">
        	<div class="page-header">
            	<div class="jumbotron">
                  <h1>Coda di invio</h1>
                </div>
            </div>
			<?php
				$db = new db();
				$db->query("SELECT u.user, u.email, m.model, l.id FROM list as l INNER JOIN users as u ON l.user= u.id_user INNER JOIN models as m ON l.model=m.id_model");
				$txt = '<table class="table table-striped table-hover table-condensed">';
					$txt .= "<thead>";
						$txt .= "<th>Utente</th>";
						$txt .= "<th>Email</th>";
						$txt .= "<th>Modello</th>";
						$txt .= "<th>Elimina</th>";
					$txt .= "</thead>";
					$txt .= "<tbody>";
						while($r = $db->fetch()){
							$txt .= "<tr>";
								$txt .= "<td>".$r['user']."</td>";
								$txt .= "<td>".$r['email']."</td>";
								$txt .= "<td>".$r['model']."</td>";
								$txt .= "<td>";
									$txt .= '<span class="glyphicon glyphicon-trash" ';
									$txt .= 'onClick="list_delete('.$r['id'].')"></span>';
								$txt .= "</td>";
							$txt .= "</tr>";
						}
					$txt .= "</tbody>";
				$txt .= "</table>";
				echo $txt;
			?>
        </div>
        <script src="<?php echo $config['urls']['baseUrl']; ?>list/script.js"></script>
    </body>
</html>