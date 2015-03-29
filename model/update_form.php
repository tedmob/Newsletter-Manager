<?php
	require_once("root.php");
	require_once($config['urls']['root']."config.php");
	require_once($config['urls']['root']."php/db.php");
	
	$db = new db();
	$id_model = $_POST['id_model'];
	$q  = "SELECT model, text, subject FROM models WHERE id_model=$id_model";
	if(!$db->query($q)) die("Errore nella query: ".$db->get_error());
	$row = $db->fetch();
?>
<form id="model_update_form">
  <input type="hidden" value="<?php echo $id_model; ?>" id="form_id_model">
  <div class="form-group">
    <label>Nome modello</label>
    <input type="text" class="form-control" id="form_model" value="<?php echo $row['model']; ?>">
  </div>
  <div class="form-group">
    <label>Oggetto della mail</label>
    <input type="text" class="form-control"  id="form_subject" value="<?php echo $row['subject']; ?>">
  </div>
  <div class="form-group">
    <textarea class="tiny"><?php echo html_entity_decode($row['text']); ?></textarea>
  </div>
  <button type="submit" class="btn btn-default">Modifica</button>
</form>