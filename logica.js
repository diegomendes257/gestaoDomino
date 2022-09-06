$(document).ready(function(){

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

            $.ajax({
                type: 'POST',
                url: 'cadastraPartida.php',
                data: {
                    duplas: true    
                    },
                beforeSend : function () {
                    console.log('duplas sendo cadastradas...');
                  },
                success: function(data){
                    alert('Duplas iniciadas');
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


    //------------------------------BOTÃO VER MAIS

    /*$('#botaoVerMais').click(function(e){
        //e.preventDefault();
        let exibeMais = true;

        $.ajax({
            type: 'get',
            url: 'consultaJogador.php',
            data: {
                exibeMais: exibeMais
                },
            beforeSend : function () {
                console.log('Já iremos exibir...');
              },
            success: function(data){
                $('#mais').html(data)
                console.log('Clique para ver mais');
            }
        });
    });*/
});