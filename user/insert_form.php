<?php
	require_once("root.php");
	require_once($config['urls']['root']."config.php");
	require_once($config['urls']['root']."php/db.php");
?>
<form id="user_insert_form">
  <div class="form-group">
    <label>Nome</label>
    <input type="text" class="form-control" name="user">
  </div>
  <div class="form-group">
    <label>Data di nascita</label>
    <input type="text" class="form-control" data-provide="datepicker" 
    	data-date-format="yyyy/mm/dd" data-date-language="it" name="birthday">
  </div>
  <div class="form-group">
    <label>Attività</label>
    <select name="category" class="form-control">
    	<?php
			$db = new db();
			if($db->query("SELECT id_category, category FROM categories WHERE active=1")){
				while($r = $db->fetch()){
					echo "<option value='".$r['id_category']."'>".$r['category']."</option>";	
				}
			}
			else die($db->get_error());
		?>
    </select>
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="text" class="form-control" name="email">
  </div>
  <div class="form-group">
    <label>Città</label>
    <input type="text" class="form-control" name="citta">
  </div>
  <button type="submit" class="btn btn-default">Inserisci</button>
</form>