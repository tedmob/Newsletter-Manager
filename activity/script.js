// JavaScript Document
function form_insert(){
	$.ajax({
		url: "activity/insert_form.php",
		success: function(msg){
			var m = new modale();
			m.titolo = "Inserimento nuova attività";
			m.corpo = msg;
			m.pulsante = false;
			m.carica();
		},
		error: function(uno, due, tre){
			alert(uno+" - "+ due+" - "+tre);	
		}
	});
}

$("#activity_insert_form").submit(function(){
	$.ajax({
		url: "activity/insert.php",
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

function activity_delete(id){
	$.ajax({
		url: "activity/delete.php",
		type: "POST",
		data: {id: id},
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