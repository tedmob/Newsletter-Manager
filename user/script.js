// JavaScript Document
function form_insert(){
	$.ajax({
		url: "user/insert_form.php",
		success: function(msg){
			var m = new modale();
			m.titolo = "Inserimento nuovo utente";
			m.corpo = msg;
			m.pulsante = false;
			m.carica();
		},
		error: function(uno, due, tre){
			alert(uno+" - "+ due+" - "+tre);	
		}
	});
}

$("#user_insert_form").submit(function(){
	$.ajax({
		url: "user/insert.php",
		data: $(this).serialize(),
		type: "POST",
		success: function(msg){
			alert(msg);
			location.reload();
		},
		error: function(uno, due, tre){
			alert(uno+" - "+ due+" - "+tre);	
		}
	});
	return false;
});

function user_update(iduser){
	$.ajax({
		url: "user/update_form.php",
		data: {id_user: iduser},
		type: "POST",
		success: function(msg){
			var m = new modale();
			m.titolo = "Aggiornamento utente";
			m.corpo = msg;
			m.pulsante = false;
			m.carica();
		},
		error: function(uno, due, tre){
			alert(uno+" - "+ due+" - "+tre);	
		}
	});
}

$("#user_update_form").submit(function(){
	$.ajax({
		url: "user/update.php",
		data: $(this).serialize(),
		type: "POST",
		success: function(msg){
			alert(msg);
			location.reload();
		},
		error: function(uno, due, tre){
			alert(uno+" - "+ due+" - "+tre);	
		}
	});
	return false;
});

function user_delete(id_user){
	$.ajax({
		url: "user/delete.php",
		type: "POST",
		data: {id_user : id_user},
		success: function(msg){
			alert(msg);
			location.reload();
		},
		error: function(uno, due, tre){
			alert(uno+" - "+ due+" - "+tre);	
		}
	});
	return false;
}