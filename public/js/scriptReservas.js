$(window).on('load', function(){

    // para poner los jugadores segun el nivel elegido
    $('#nivel').change(function(){

        var nivel = $('#nivel').val();

        var jugador1 = $('#jugador1');        
        var jugador2 = $('#jugador2');
        var jugador3 = $('#jugador3');        
        var jugador4 = $('#jugador4'); 

        var optionJugador1 = $('#optionJugador1');        
        var optionJugador2 = $('#optionJugador2');
        var optionJugador3 = $('#optionJugador3');        
        var optionJugador4 = $('#optionJugador4'); 

        if (nivel == 0) {

            if (jugador1.children('option') || jugador2.children('option') || jugador3.children('option') || jugador4.children('option')) {

                optionJugador1.siblings('option').remove();
                optionJugador1.select();

                optionJugador2.siblings('option').remove();
                optionJugador2.select();

                optionJugador3.siblings('option').remove();
                optionJugador3.select();

                optionJugador4.siblings('option').remove();
                optionJugador4.select();

            }
        
        }else{

            if (jugador1.children('option') || jugador2.children('option') || jugador3.children('option') || jugador4.children('option')) {

                optionJugador1.siblings('option').remove();
                optionJugador1.select();

                optionJugador2.siblings('option').remove();
                optionJugador2.select();

                optionJugador3.siblings('option').remove();
                optionJugador3.select();

                optionJugador4.siblings('option').remove();
                optionJugador4.select();

            }

            $.get('/jugadores/'+nivel, function(data) {

                var option = '';
                var niv = '';

                $.each(data, function(index, jugador) {

                    if (jugador.id_nivel == 1) {

                        niv = '(PRI)';

                    }else if (jugador.id_nivel == 2) {

                        niv = '(AMA)';

                    }else if (jugador.id_nivel == 3) {

                        niv = '(INT)';

                    }else{

                        niv = '(PRO)';

                    }
                    
                    option += '<option class="letraColor" value="'+ jugador.id +'">'+jugador.name+' '+jugador.telefono+' '+niv+'</option>';
                });

                jugador1.append(option);
                jugador2.append(option);
                jugador3.append(option);
                jugador4.append(option);


            },'json');
        }


    });

 });