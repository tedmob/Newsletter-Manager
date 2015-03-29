<?php
	require_once("root.php");
	require_once($config['urls']['root']."config.php");
	require_once($config['urls']['root']."php/db.php");
	
	$db = new db();
	$id_user = $_POST['id_user'];
	$q  = "SELECT id_user, user, birthday, c.category as category, u.category as id_category, citta, email FROM users as u, ";
	$q .= "categories as c WHERE u.id_user=$id_user";
	if(!$db->query($q)) die("Errore nella query: ".$db->get_error());
	$row = $db->fetch();
?>
<form id="user_update_form">
	<input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">
  <div class="form-group">
    <label>Nome</label>
    <input type="text" class="form-control" name="user" value="<?php echo $row['user']; ?>">
  </div>
  <div class="form-group">
    <label>Data di nascita</label>
    <input type="text" class="form-control" data-provide="datepicker" 
    	data-date-format="yyyy/mm/dd" data-date-language="it" name="birthday" value="<?php echo $row['birthday']; ?>">
  </div>
  <div class="form-group">
    <label>Attività</label>
    <select name="category" class="form-control">
    	<option selected value="<?php echo $row['id_category']; ?>"><?php echo $row['category']; ?></option>
    	<?php
			$db2 = new db();
			if($db2->query("SELECT id_category, category FROM categories WHERE active=1")){
				while($r = $db2->fetch()){
					echo "<option value='".$r['id_category']."'>".$r['category']."</option>";	
				}
			}
			else die($db2->get_error());
		?>
    </select>
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>">
  </div>
  <div class="form-group">
    <label>Città</label>
    <input type="text" class="form-control" name="citta" value="<?php echo $row['citta']; ?>">
  </div>
  <button type="submit" class="btn btn-default">Aggiorna</button>
</form>