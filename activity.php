<!doctype html>
<html>
    <head>
    	<?php
			require_once("root.php");
			require_once($config['urls']['root']."php/db.php");
			require_once($config['urls']['root']."resource/header.php");
			require_once($config['urls']['root']."activity/main.php");
			$act = new activity();
		?>
        <meta charset="utf-8">
        <title>Newsletter Manager</title>
    </head>
    <body>
        <?php require_once($config['urls']['root']."resource/navbar.php"); ?>
        <div class="container">
        	<div class="page-header">
            	<div class="jumbotron">
                  <h1>Attività</h1>
                  <p>
                  	<button class="btn btn-primary btn-lg pull-right" onClick="form_insert();">Nuovo</button>
                  </p>
                </div>
            </div>
            <?php echo $act->get_table(); ?>
            <?php //echo $user->get_pagination(isset($_GET['page']) ? $_GET['page']: 1); ?>
        </div>
        <script src="<?php echo $config['urls']['baseUrl']; ?>activity/script.js"></script>
    </body>
</html>