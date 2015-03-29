<!doctype html>
<html>
    <head>
    	<?php
			require_once("root.php");
			require_once($config['urls']['root']."php/db.php");
			require_once($config['urls']['root']."resource/header.php");
			require_once($config['urls']['root']."option/main.php");
			$option = new option();
		?>
        <meta charset="utf-8">
        <title>Newsletter Manager</title>
    </head>
    <body>
        <?php require_once($config['urls']['root']."resource/navbar.php"); ?>
        <div class="container">
        	<div class="page-header">
            	<div class="jumbotron">
                  <h1>Impostazioni</h1>
                </div>
            </div>
            <form id="option_form">
                <div class="form-group">
                    <label>Numero massimo di email inviabili al giorno</label>
                    <input type="number" value="<?php echo $option->max_daily_email; ?>" class="form-control" name="max_msg">
                </div>
                <div class="form-group">
                    <label>SMTP Host</label>
                    <input type="text" value="<?php echo $option->smtp_host; ?>" class="form-control" name="smtp_host">
                </div>
                <div class="form-group">
                    <label>SMTP Username</label>
                    <input type="text" value="<?php echo $option->smtp_user; ?>" class="form-control" name="smtp_user">
                </div>
                <div class="form-group">
                    <label>SMTP Password</label>
                    <input type="password" value="<?php echo $option->smtp_password; ?>" class="form-control" name="smtp_pass">
                </div>
                <div class="form-group">
                    <label>SMTP Port</label>
                    <input type="text" value="<?php echo $option->smtp_port; ?>" class="form-control" name="smtp_port">
                </div>
                <div class="form-group">
                    <label>Nome mittente</label>
                    <input type="text" value="<?php echo $option->smtp_name; ?>" class="form-control" name="smtp_name">
                </div>
                <div class="form-group">
                    <label>Email mittente</label>
                    <input type="text" value="<?php echo $option->smtp_email; ?>" class="form-control" name="smtp_email">
                </div>
                <button type="submit" class="btn btn-default">Salva</button>
        </form>
        </div>
        <br><br>
        <script src="<?php echo $config['urls']['baseUrl']; ?>option/script.js"></script>
    </body>
</html>