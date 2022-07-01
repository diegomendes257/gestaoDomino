$(document).ready(function(){

    // TOQUE
    $('#confirmaToque').click(function(){
        var selecao = document.querySelector('input[name=exampleRadios]:checked').value;
        var nomeToque = $('.col').text();
        /*$.ajax({
            type: 'POST',
            url: 'cadastraDupla.php',
            data: {
                jogador1: jogador1,
                jogador2: jogador2    
                },
            beforeSend : function () {
                console.log('carregando...');
            },
            success: function(){
                alert('Dupla 1 cadastrada')
            }
        });*/

		alert(nomeToque + selecao);
	});

    // BATIDA
    $('#confirmaBatida').click(function(){
        var selecao = document.querySelector('input[name=exampleRadios1]:checked').value;
		alert(selecao);
	});

    let click = 1;

    $('.jog').click(function(event){

        if(click == 1){
            event.preventDefault();
            var div1 = $(this);
            //var idj = $(this).attr('value');
            $('.jogador1').append(click);
            $('.nomeJ1').append(div1);
        }if(click == 2){
            event.preventDefault();
            var div1 = $(this);
            //var idj = $(this).attr('value');
            $('.jogador2').append(click);
            $('.nomeJ2').append(div1);

            var jogador1 = $('.nomeJ1 .jog').attr('value');
            var jogador2 = $('.nomeJ2 .jog').attr('value');
        
            $.ajax({
                type: 'POST',
                url: 'cadastraDupla.php',
                data: {
                    jogador1: jogador1,
                    jogador2: jogador2    
                    },
                beforeSend : function () {
                    console.log('carregando...');
                },
                success: function(){
                    alert('Dupla 1 cadastrada')
                }
            });
        }

        if(click == 3){
            event.preventDefault();
            var div1 = $(this);
            //var idj = $(this).attr('value');
            $('.jogador3').append(click);
            $('.nomeJ3').append(div1);
        }if(click == 4){
            event.preventDefault();
            var div1 = $(this);
            //var idj = $(this).attr('value');
            $('.jogador4').append(click);
            $('.nomeJ4').append(div1);

            var jogador3 = $('.nomeJ3 .jog').attr('value');
            var jogador4 = $('.nomeJ4 .jog').attr('value');
        
            $.ajax({
                type: 'POST',
                url: 'cadastraDupla.php',
                data: {
                    jogador1: jogador3,
                    jogador2: jogador4    
                    },
                beforeSend : function () {
                    console.log('carregando...');
                  },
                success: function(){
                    alert('Dupla 2 cadastrada')
                }
            });
        }
        click++;
    });

    $('#botaoIniciarJogo').click(function(){
        
        if(click > 4){
            alert("PREPARE-SE! O jogo vai começar!");
            window.location.href="jogo.php"; 
        }else{
            alert('Você ainda não cadastrou as duplas');
        }
    });
});