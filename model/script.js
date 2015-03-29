// JavaScript Document
function form_insert(){
	$.ajax({
		url: "model/insert_form.php",
		success: function(msg){
			var m = new modale();
			m.titolo = "Inserimento nuovo modello";
			m.corpo = msg;
			m.pulsante = false;
			m.carica();
		},
		error: function(uno, due, tre){
			alert(uno+" - "+ due+" - "+tre);	
		}
	});
}

$("#model_insert_form").submit(function(){
	$.ajax({
		url: "model/insert.php",
		data: {model: $("#form_model").val(), subject: $("#form_subject").val(), txt: tinyMCE.activeEditor.getContent({format : 'raw'})},
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

function model_update(id_model){
	$.ajax({
		url: "model/update_form.php",
		data: {id_model: id_model},
		type: "POST",
		success: function(msg){
			var m = new modale();
			m.titolo = "Aggiornamento modello";
			m.corpo = msg;
			m.pulsante = false;
			m.carica();
		},
		error: function(uno, due, tre){
			alert(uno+" - "+ due+" - "+tre);	
		}
	});
}

$("#model_update_form").submit(function(){
	$.ajax({
		url: "model/update.php",
		data: {id_model: $("#form_id_model").val(), model: $("#form_model").val(), subject: $("#form_subject").val(), txt: tinyMCE.activeEditor.getContent({format : 'raw'})},
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

function model_delete(id_model){
	$.ajax({
		url: "model/delete.php",
		type: "POST",
		data: {id_model : id_model},
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
$(function() {   
  tinyMCE.init({
	  selector: '.tiny',
	  language : "it", 
	  plugins: [
		"advlist autolink lists link image charmap print preview anchor",
		"searchreplace visualblocks code fullscreen",
		"insertdatetime media table contextmenu paste"
	  ],
	  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | image", file_browser_callback: RoxyFileBrowser}); 
});

function RoxyFileBrowser(field_name, url, type, win) {
	  var roxyFileman = '/newsletter/resource/fileman/index.html';
	  if (roxyFileman.indexOf("?") < 0) {     
		roxyFileman += "?type=" + type;   
	  }
	  else {
		roxyFileman += "&type=" + type;
	  }
	  roxyFileman += '&input=' + field_name + '&value=' + win.document.getElementById(field_name).value;
	  if(tinyMCE.activeEditor.settings.language){
		roxyFileman += '&langCode=' + tinyMCE.activeEditor.settings.language;
	  }
	  tinyMCE.activeEditor.windowManager.open({
		 file: roxyFileman,
		 title: 'Roxy Fileman',
		 width: 850, 
		 height: 700,
		 resizable: "yes",
		 plugins: "media",
		 inline: "yes",
		 close_previous: "no"  
	  }, {     window: win,     input: field_name    });
	  return false; 
}