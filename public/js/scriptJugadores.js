$(window).on('load',  function() {

	// para poner las poblaciones segun eliges la provincia
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

    //// Para elimiar el jugador
	$('.eliminarJugador').click(function(e){

        e.preventDefault();

        var jugador = $(this).val(); // value del boton (id de USER)
        var form = $(this).parents('form'); // formulario de este boton, formulario padre
        var url = form.attr('action').replace(':USER_ID', jugador); // atributo action de dicho formulario
        var data = form.serialize(); // datos del formulario (METHOD y TOKEN)
        var tr = $(this).parents('tr'); // La etiqueta tr padre de dicho boton
        var nombre = $(this).parents('tr').find('td').first().text(); // nombre del empleado a borrar
        var tabla = $('#tablaJugadores');
//        var tbody = $(this).parents('tbody');

        if(! confirm('¿Esta seguro que desea eliminar el empleado ' + nombre + '?')){

            alert('El empleado ' + nombre + ' no fue eliminado');
        
        }else{

            $.ajax({
                
                url: url,
                type: 'POST',
                dataType: 'json',
                data: data,
            
            })
            .done(function(data) {
                
                alert(data.nombre);

                if (tabla.children()) {

                    tr.fadeOut(); // retocar lo de la tabla y poner que cuando no haya user que se borre por completo 
                    $(location).attr('href','jugadores');
                }                

            })
            .fail(function(data) {
                console.log("error --- " + data);
            })
            .always(function(data) {
                console.log("complete --- " + data);
            });
        }
    });

    // para que no aparezcan los campos de los documentos DNI y NIE
    var dni = $('#dni');
    var nif = $('#nif');
    dni.css('display', 'none');
    nif.css('display', 'none');
    $('#documento > option[value="sin"]').attr('selected', 'selected');

    if (dni.val().length > 0) {
        
        $('#documento > option[value="nif"]').attr('selected', 'selected');
        dni.css('display', 'block');

    }else if (nif.val().length > 0) {

        $('#documento > option[value="nie"]').attr('selected', 'selected');
        nif.css('display', 'block');

    }

    // para poner poner el input text depende del tipo de documento que elijas
    $('#documento').change(function(event) {
    
        event.preventDefault(); 

        var documento = $('#documento').val();        

        if (documento == 'sin') {

            dni.css('display', 'none');
            nif.css('display', 'none');

        }else if (documento == 'nif') {

            nif.css('display', 'none');
            dni.css('display', 'block');
        
        }else if (documento == 'nie') {

            dni.css('display', 'none');
            nif.css('display', 'block');
        }

    });

});