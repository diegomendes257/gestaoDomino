$(document).ready(function(){

    function fimPartida(){

        let nome1 = $('#j1').text();
        let nome2 = $('#j2').text();
        let nome3 = $('#j3').text();
        let nome4 = $('#j4').text();

        let dupla_1 = $('#dupla_1').text(); // ponto dupla_1
        let dupla_2 = $('#dupla_2').text(); // ponto dupla_2

        if(dupla_1 > 5){
            alert('Parabéns ' + nome3 + nome4 + ', vocês ganharam de ' + dupla_1 + ' a ' + dupla_2);
            window.location.href = 'index.php';
        }
        
        if(dupla_2 > 5){
            alert('Parabéns ' + nome1 + nome2 + ', vocês ganharam de ' + dupla_2 + ' a ' + dupla_1);
            window.location.href = 'index.php';
        }        
    }

    fimPartida();


    // TOQUE
    $('#jogador1').click(function(){
        
        const id_jogador_toque = $('#1').text(); // id do jogador
        const id1 = $('#1').attr('id');
        $('#confirmaToque1').click(function(){
            var selecao = document.querySelector('input[name=exampleRadios]:checked').value;

            $.ajax({
                type: 'POST',
                url: 'toque.php',
                data: {
                    deu_toque : selecao,
                    levou_toque : id_jogador_toque    
                    },
                beforeSend : function () {
                    console.log('carregando...');
                },
                success: function(){
                    alert('Sucesso!');
                }
            });
            window.location.reload();
        });
    });

    $('#jogador2').click(function(){
        const id_jogador_toque = $('#2').text();
        const id2 = $('#2').attr('id');
        $('#confirmaToque2').click(function(){
            var selecao = document.querySelector('input[name=exampleRadios]:checked').value;

            $.ajax({
                type: 'POST',
                url: 'toque.php',
                data: {
                    deu_toque : selecao,
                    levou_toque : id_jogador_toque    
                    },
                beforeSend : function () {
                    console.log('carregando...');
                },
                success: function(){
                    alert('Sucesso!');
                    
                }
            });
            window.location.reload();
        });
    });

    $('#jogador3').click(function(){
        const id_jogador_toque = $('#3').text();
        const id3 = $('#3').attr('id');
        $('#confirmaToque3').click(function(){
            var selecao = document.querySelector('input[name=exampleRadios]:checked').value;

            $.ajax({
                type: 'POST',
                url: 'toque.php',
                data: {
                    deu_toque : selecao,
                    levou_toque : id_jogador_toque    
                    },
                beforeSend : function () {
                    console.log('carregando...');
                },
                success: function(){
                    alert('Sucesso!');
                    
                }
            });
            window.location.reload();
        });
    });

    $('#jogador4').click(function(){
        const id_jogador_toque = $('#4').text();
        const id4 = $('#4').attr('id');
        $('#confirmaToque4').click(function(){
            var selecao = document.querySelector('input[name=exampleRadios]:checked').value;

            $.ajax({
                type: 'POST',
                url: 'toque.php',
                data: {
                    deu_toque : selecao,
                    levou_toque : id_jogador_toque    
                    },
                beforeSend : function () {
                    console.log('carregando...');
                },
                success: function(){
                    alert('Sucesso!');
                    
                }
            });
            window.location.reload();
        });
    });

    


    // BATIDA
    $('#confirmaBatida1').click(function(){
        let selecaoBatida = document.querySelector('input[name=exampleRadios1]:checked').value;
        let idBatida = $('#1').text();
        const id1 = $('#1').attr('id');

        $.ajax({
            type: 'POST',
            url: 'batidas.php',
            data: {
                bateu : idBatida,
                tipo : selecaoBatida    
                },
            beforeSend : function () {
                console.log('carregando...');
            },
            success: function(){
                alert('Sucesso!');
                alert(idBatida + selecaoBatida);
            }
        });
        window.location.reload();
    });

    $('#confirmaBatida2').click(function(){
        let selecaoBatida = document.querySelector('input[name=exampleRadios1]:checked').value;
        let idBatida = $('#2').text();
        const id1 = $('#2').attr('id');

        $.ajax({
            type: 'POST',
            url: 'batidas.php',
            data: {
                bateu : idBatida,
                tipo : selecaoBatida    
                },
            beforeSend : function () {
                console.log('carregando...');
            },
            success: function(){
                alert('Sucesso!');
                alert(idBatida + selecaoBatida);
            }
        });
        window.location.reload();
        
    });

    $('#confirmaBatida3').click(function(){
        let selecaoBatida = document.querySelector('input[name=exampleRadios1]:checked').value;
        let idBatida = $('#3').text();
        const id1 = $('#3').attr('id');

        $.ajax({
            type: 'POST',
            url: 'batidas.php',
            data: {
                bateu : idBatida,
                tipo : selecaoBatida    
                },
            beforeSend : function () {
                console.log('carregando...');
            },
            success: function(){
                alert('Sucesso!');
                alert(idBatida + selecaoBatida);
            }
        });

        window.location.reload();
    });

    $('#confirmaBatida4').click(function(){
        let selecaoBatida = document.querySelector('input[name=exampleRadios1]:checked').value;
        let idBatida = $('#4').text();
        const id1 = $('#4').attr('id');

        $.ajax({
            type: 'POST',
            url: 'batidas.php',
            data: {
                bateu : idBatida,
                tipo : selecaoBatida    
                },
            beforeSend : function () {
                console.log('carregando...');
            },
            success: function(){
                alert('Sucesso!');
                alert(idBatida + selecaoBatida);
            }
        });
        window.location.reload();
    });

});