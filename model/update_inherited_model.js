//update_inherited_model.js
//Creator: Alex Stabile
//Date: 30/03/2015

$("#form_model_inherited").change(function(e) {
	$.ajax({
		url: "model/get_model_content.php",
		type: "POST",
		data: {id: $(this).val()},
		success: function(msg){
			tinyMCE.activeEditor.setContent(msg);
		},
		error: function (uno, due, tre){
			alert(uno+"-"+due+"-"+tre);	
		}
	});
});