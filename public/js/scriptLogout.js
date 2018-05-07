$(window).on('load', function(event) {

	$('#logout').click(function(event) {
	
		event.preventDefault();

		if (confirm('¿Esta seguro que desea cerrar la sesión?')) {

			$('#logout-form').submit();
		}

	});

});