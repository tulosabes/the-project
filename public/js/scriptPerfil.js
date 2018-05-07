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