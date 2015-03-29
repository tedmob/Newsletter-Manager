<!doctype html>
<html>
    <head>
    	<?php
			require_once("root.php");
			require_once($config['urls']['root']."php/db.php");
			require_once($config['urls']['root']."resource/header.php");
			require_once($config['urls']['root']."send/main.php");
			$send = new send();
		?>
        <meta charset="utf-8">
        <title>Newsletter Manager</title>
    </head>
    <body>
        <?php require_once($config['urls']['root']."resource/navbar.php"); ?>
        <div class="container">
        	<div class="page-header">
            	<div class="jumbotron">
                  <h1>Invio</h1>
                </div>
            </div>
            <?php require_once($config['urls']['root']."send/filtro_form.php"); ?>
            <div class="row" id="lista_utenti">
            	
            </div>
            <form class="form-inline" id="model_form">
            	<table class="table">
                	<tbody>
                    	<tr>
                        	<td><label>Modello</label></td>
                            <td>
                                <select name="model" id="model_selected" class="form-control">
                                    <?php
                                        $db = new db();
                                        if($db->query("SELECT id_model, model FROM models WHERE active=1")){
                                            while($r = $db->fetch()){
                                                echo "<option value='".$r['id_model']."'>".$r['model']."</option>";	
                                            }
                                        }
                                        else die($db->get_error());
                                    ?>
                                </select>
                            </td>
                		</tr>
                        <tr>
                            <td><button type="submit" class="btn btn-primary">Metti in coda per l'invio</button></td>
                            <td></td>
                        </tr>
                  	</tbody>
              	</table>
            </form>
        </div>
        <script src="<?php echo $config['urls']['baseUrl']; ?>send/script.js"></script>
        <style>
			body{
				padding-bottom: 50px;	
			}
			#lista_utenti{
				padding: 20px;
				max-height:200px;
				overflow:auto;	
				margin: 50px;
			}
		</style>
    </body>
</html>