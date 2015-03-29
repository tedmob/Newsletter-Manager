<!doctype html>
<html>
    <head>
    	<?php
			require_once("root.php");
			require_once($config['urls']['root']."php/db.php");
			require_once($config['urls']['root']."resource/header.php");
			require_once($config['urls']['root']."model/main.php");
			$model = new model();
		?>
        <script type="text/javascript" src="<?php echo $config['resource']['3part']; ?>tinymce/tinymce.min.js"></script>
        <meta charset="utf-8">
        <title>Newsletter Manager</title>
    </head>
    <body>
        <?php require_once($config['urls']['root']."resource/navbar.php"); ?>
        <div class="container">
        	<div class="page-header">
            	<div class="jumbotron">
                  <h1>Modelli</h1>
                  <p>
                  	<button class="btn btn-primary btn-lg pull-right" onClick="form_insert();">Nuovo</button>
                  </p>
                </div>
            </div>
            <?php echo $model->get_table(); ?>
        </div>
        <script src="<?php echo $config['urls']['baseUrl']; ?>model/script.js"></script>
        <style>
			body .modal-dialog {
				/* new custom width */
				width: 90%;
			}
		</style>
    </body>
</html>