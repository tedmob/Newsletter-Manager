// JavaScript Document

function list_delete(id_list){
	$.ajax({
		url: "list/delete.php",
		data: {id: id_list},
		type: "POST",
		success: function(msg){
			location.reload();
		},
		error: function(uno, due, tre){
			alert(uno+" - "+ due+" - "+tre);	
		}
	});
	return false;
}