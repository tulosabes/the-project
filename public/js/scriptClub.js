$(window).on('load', function() {

	$('#provincia').change(function(event) {
		
		event.preventDefault();

		var pro = $('#provincia').val();

		var poblaciones = $('#poblacion');
		var optionPoblacion = $('#optionPoblacion');

		if (pro == 0) {

			if (poblaciones.children('option')) {

				optionPoblacion.siblings('option').remove();
				optionPoblacion.select();

			}
		
		}else{

			$.get('/poblaciones/'+pro, function(data) {

				if (poblaciones.children('option')) {

					optionPoblacion.siblings('option').remove();
					optionPoblacion.select();

				}

				var option = '';

				
				$.each(data, function(index, poblacion) {
					
					option += '<option value="'+ poblacion.id +'">'+ poblacion.poblacion +'</option>';
				});

				poblaciones.append(option);

			},'json');
		}	
		

	});


});	