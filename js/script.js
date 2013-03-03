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
})