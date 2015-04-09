// JavaScript Document
var mex = null;
$(document).ready(function(e) {
    $("#send_filtri_form").submit(function(){
		$.ajax({
			url: "send/filtra.php",
			data: $(this).serialize(),
			type: "POST",
			success: function(msg){
				mex = msg;
				msg = $.parseXML(msg);
				$txt = "<table class='table table-striped table-hover table-condensed'><tbody>";
				$(msg).find("user").each(function(index, element) {
                    $txt += "<tr>";
						$txt += "<td>"+$(this).find("name").text()+"</td>";
						$txt += "<td>"+$(this).find("birthday").text()+"</td>";
						$txt += "<td>"+$(this).find("category").text()+"</td>";
						$txt += "<td>"+$(this).find("email").text()+"</td>";
					$txt += "</tr>";
                });	
				$txt += "</tbody></table>";
				$("#lista_utenti").html($txt);
				return false;
			},
			error: function(uno, due, tre){
				alert(uno+" - "+ due+" - "+tre);	
			}
		});
		return false;
	});
	$("#model_form").submit(function(){
		if(confirm("Sei sicuro di voler aggiungere gli elementi alla coda di invio?")){
			//prendo xml creato con il filtraggio e aggiungo ogni elemento alla tabella list per un successivo invio
			if(mex!=null){
				msg = $.parseXML(mex);
				$(msg).find("user").each(function(index, element) {
					$.ajax({
						url: "send/list_add.php",
						type: "POST",
						data: {model: $("#model_selected").val(), user: $(this).find("id").text()},
						success: function(msg){
							alert(msg);
						},
						error: function(uno, due, tre){
							alert(uno+" - "+ due+" - "+tre);	
						}
					});
				});	
			}
		}
		return false;
	});
});