$(document).ready(function(){
	$('input, textarea').placeholder();
	
	$(".tabs_wrap").tabs({
		select: function(event, ui) {
			var url = $.data(ui.tab, 'load.tabs');
			if( url ) {
			  location.href = url;
			  return false;
			}
			return true;
		}
	});
	
	$(".tabs_wrap_painel").tabs({
		select: function(event, ui) {
			var url = $.data(ui.tab, 'load.tabs');
			if( url ) {
			  location.href = url;
			  return false;
			}
			return true;
		}
	});
	
	$('#simple_form [title]').tipsy({trigger: 'focus', gravity: 'w'}); // nw | n | ne | w | e | sw | s | se
	
	$(".cad_termos").colorbox({iframe:true, width:"60%", height:"80%"});
})