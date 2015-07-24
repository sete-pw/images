$(document).ready(function(){

	$('.delete').click(function(e){
		e.preventDefault();

		$(this).closest('form').submit();
	});

});