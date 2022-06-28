$(document).ready(function(){

    // TOQUE
    $('#confirmaToque').click(function(){
        var selecao = document.querySelector('input[name=exampleRadios]:checked').value;
		alert(selecao);
	});

    // BATIDA
    $('#confirmaBatida').click(function(){
        var selecao = document.querySelector('input[name=exampleRadios1]:checked').value;
		alert(selecao);
	});

    let click = 1;
    $('.botaoEnviaDupla1').hide();
    $('.botaoEnviaDupla2').hide();
    //var nomej = $(this).attr('value');      // pega o valor dentro da div
    $('.jog').click(function(event){

        if(click <= 2){
            event.preventDefault();
            var div1 = $(this);
            var idj = $(this).attr('value');
            $('#dupla1').append(click, div1);
            if(click == 1){
                var jogador1 = idj;
                console.log(jogador1)
            }else if(click == 2){
                var jogador2 = idj;
                console.log(jogador2)

                $.ajax({
                    type: 'POST',
                    url: 'cadastraDupla.php',
                    data: {
                        jogador1: jogador1,
                        jogador2: jogador2    
                        },
                    success: function(){
                        alert('dupla 1 cadastrada')
                    }
                });
                
                //$('.botaoEnviaDupla1').show();

            }
        }
        if(click > 2 && click <= 4){
            event.preventDefault();
            var div1 = $(this);
             idj = $(this).attr('value');
            $('#dupla2').append(click, div1);
            if(click == 3){
                var jogador3 = idj;
                console.log(jogador3)
            }else if(click == 4){
                var jogador4 = idj;
                console.log(jogador4)
                
                //$('.botaoEnviaDupla2').show();

                    $.ajax({
                        type: 'POST',
                        url: 'cadastraDupla.php',
                        data: {
                            jogador1: jogador1,
                            jogador2: jogador2    
                            },
                        success: function(){
                            alert('dupla 2 cadastrada')
                        }
                    });
            }
        }
        if(click > 4){
            event.preventDefault();
            var div1 = $(this);
            $('.nomeJogadores').append(div1);
        }
        click++;
    });


    $('#botaoIniciarJogo').click(function(){
    });
        
        /*var idj = $(this).attr('value');


        var j1 = 2;
        var j2 = 6;
        var j3 = 8;
        var j4 = 10;
        $.ajax({
            type: 'POST',
            url: 'cadastraDupla.php',
            data: {
                jogador1: j1,
                jogador2: j2,
                jogador3: j3,
                jogador4: j4    
                },
            success: function(){
                alert('duplas cadastradas')
                alert('<a href="jogo.php"></a>')
            }
        });
    });
    $('#botaoIniciarJogo').click(function(){
        
        $.ajax({
            type: 'POST',
            url: 'cadastraDupla.php',
            data:   {
                jogador3: jogador3,
                jogador4: jogador4    
                },
            success: function(){
                console.log('cadastrou dupla 2')
            }
        });
            var tem = 'Diego';
            $.ajax({
                type: 'POST',
                url: 'cadastraDupla.php',
                data: {tem: tem},
                success: function(){
                    console.log('pegando')
                }
            });

        $.ajax({
            url: 'cadastraDupla.php',
            type: 'POST',
            data: {
                jogador1: jogador1,
                jogador2: jogador2,
                jogador3: jogador3,
                jogador4: jogador4
                },
            success: function(){
                alert('Duplas cadastradas com sucesso!');
                window.location.href = 'cadastraDupla.php';
                //$('.valorExibe').html(data)
            }
        });*/
    //}); 



    /*$('#botaoIniciarJogo').click(function(){
        var jogador1 = 1;
        var jogador2 = 2;
        var jogador3 = 3;
        var jogador4 = 4;
        alert('iniciando');
        $.ajax({
            type: 'POST',
            url: 'cadastraDupla.php',
            data: {
                jogador1: jogador1
                },
            success: function(){
                window.location.href = 'cadastraDupla.php';
                //$('.valorExibe').html(data)
            }
        });
    });    */

});