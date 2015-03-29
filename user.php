<!doctype html>
<html>
    <head>
    	<?php
			require_once("root.php");
			require_once($config['urls']['root']."php/db.php");
			require_once($config['urls']['root']."resource/header.php");
			require_once($config['urls']['root']."user/main.php");
			$user = new user();
		?>
        <meta charset="utf-8">
        <title>Newsletter Manager</title>
    </head>
    <body>
        <?php require_once($config['urls']['root']."resource/navbar.php"); ?>
        <div class="container">
        	<div class="page-header">
            	<div class="jumbotron">
                  <h1>Clienti</h1>
                  <p>
                  	<button class="btn btn-primary btn-lg pull-right" onClick="form_insert();">Nuovo</button>
                  </p>
                </div>
            </div>
            <?php echo $user->get_table(isset($_GET['page']) ? $_GET['page']: 1); ?>
            <?php //echo $user->get_pagination(isset($_GET['page']) ? $_GET['page']: 1); ?>
        </div>
        <script src="<?php echo $config['urls']['baseUrl']; ?>user/script.js"></script>
    </body>
</html>