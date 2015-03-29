<?php
	require_once("root.php");
	require_once($config['urls']['root']."config.php");
	require_once($config['urls']['root']."php/db.php");
?>
<form id="send_filtri_form" class="form-inline">
	<table class='table'>
    <tbody>
    	<tr>
        	<td>
    			<label>Nome</label>
            </td>
            <td>
        		<input type="text" class="form-control" name="user">
           	</td>
		<tr>
			<td><label>Età &gt; di</label></td>
            <td><input type="number" value="0" class="form-control" name="eta1"></td>
        </tr>
        <tr>
        	<td><label>Età &lt; di</label></td>
        	<td><input type="number" value="99" class="form-control" name="eta2"></td>
        </tr>
		<tr>
        	<td><label>Città</label></td>
            <td><input type="text" class="form-control" name="citta"></td>
        </tr>
   		<tr>
        	<td><label>Attività</label></td>
            <td>
            	<select name="category" class="form-control">
					<option selected value="0">Tutte</option>
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
           	</td>
      	</tr>
    	<tr>
        	<td><button type="submit" class="btn btn-default">Filtra</button></td>
            <td></td>
        </tr>
   	</tbody>
    </table>
</form>