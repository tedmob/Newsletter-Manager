// JavaScript Document
$(document).ready(function(e) {
    $("#option_form").submit(function(){
		$.ajax({
			url: "option/update.php",
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
});