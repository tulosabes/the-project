$(window).on('load', function(event) {

	$('#logout').click(function(event) {
	
		event.preventDefault();

		$('#logout-form').submit();
		

	});

});