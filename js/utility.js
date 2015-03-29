// JavaScript Document
function modale(){
	this.titolo 	= "";
	this.corpo 		= "";
	this.pulsante 	= false;
	
	this.carica = function(){
		var txt = "";
		txt += '<div class="modal fade">';
		  txt += '<div class="modal-dialog">';
			txt += '<div class="modal-content">';
			  txt += '<div class="modal-header">';
				txt += '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
					txt += '<span aria-hidden="true">';
						txt += '&times;';
					txt += '</span>';
				txt += '</button>';
				txt += '<h4 class="modal-title">'+this.titolo+'</h4>';
			  txt += ' </div>';
			  txt += '<div class="modal-body">';
				txt += this.corpo;
			  txt += '</div>';
			  if(this.pulsante){
				  txt += '<div class="modal-footer">';
					txt += '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
					txt += '<button type="button" class="btn btn-primary">Save changes</button>';
				  txt += '</div>';
			  }
			txt += '</div><!-- /.modal-content -->';
		  txt += '</div><!-- /.modal-dialog -->';
		txt += '</div><!-- /.modal -->	';
		$('.modal').remove();
		var txtbody = $('body').html();
		$('body').html(txt+txtbody);
		$('.modal').modal();
	}
}

$(document).ready(function(e) {
    $(".datepicker").datepicker();
});

$(document).ready(function(e) {
    $('table').tablesorter();
});