<?php
	require_once("root.php");
	require_once($config['urls']['root']."config.php");
	require_once($config['urls']['root']."php/db.php");
?>
<form id="model_insert_form">
  <div class="form-group">
    <label>Nome modello</label>
    <input type="text" class="form-control" id="form_model">
  </div>
  <div class="form-group">
    <label>Derivare da</label>
    <select class="form-control" id="form_model_inherited">
    	<option value="" selected></option>
        <?php
			$db = new db();
			$query  = "SELECT id_model as id, model FROM models WHERE active=1";
			if(!$db->query($query)) die("Errore nella query: ".$db->get_error());
			while($row = $db->fetch()){
				echo '<option value="'.$row['id'].'">'.$row['model'].'</option>';
			}			
		?>
    </select>
  </div>
  <div class="form-group">
    <label>Oggetto della mail</label>
    <input type="text" class="form-control"  id="form_subject">
  </div>
  <div class="form-group">
    <textarea class="tiny"></textarea>
  </div>
  <button type="submit" class="btn btn-default">Inserisci</button>
</form>
<script type="text/javascript" src="<?php echo $config['urls']['baseUrl']."model/update_inherited_model.js"; ?>"></script>