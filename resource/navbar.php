<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo $config['urls']['baseUrl']; ?>">Newsletter manager</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav pull-right">
        <li><a href="<?php echo $config['urls']['baseUrl']; ?>user.php">Utenti</a></li>
        <li><a href="<?php echo $config['urls']['baseUrl']; ?>model.php">Modelli</a></li>
        <li><a href="<?php echo $config['urls']['baseUrl']; ?>send.php">Invio</a></li>
        <li><a href="<?php echo $config['urls']['baseUrl']; ?>activity.php">Attività</a></li>
        <li><a href="<?php echo $config['urls']['baseUrl']; ?>option.php">Impostazioni</a></li>
        <li><a href="<?php echo $config['urls']['baseUrl']; ?>log.php">Controllo errori</a></li>
        <li><a href="<?php echo $config['urls']['baseUrl']; ?>list.php">Coda di invio</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>