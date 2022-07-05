$(document).ready(function(){

    // TOQUE
    $('#jogador1').click(function(event){
        event.preventDefault();
        const id_jogador_toque = $('#1').text();
        const id1 = $('#1').attr('id');
        //alert(id1);
        $('#confirmaToque1').click(function(){
            var selecao = document.querySelector('input[name=exampleRadios]:checked').value;
            //alert(id_jogador_toque + id1 + selecao);

            $.ajax({
                type: 'POST',
                url: 'toque.php',
                data: {
                    selecao: selecao,
                    id_jogador_toque: id_jogador_toque,
                    id_jogador: selecao    
                    },
                beforeSend : function () {
                    console.log('carregando...');
                },
                success: function(){
                    //alert(id_jogador_toque + selecao)
                    alert('Sucesso!');
                }
            });
        });
    });

    $('#jogador2').click(function(event){
        event.preventDefault();
        const id_jogador_toque = $('#2').text();
        const id2 = $('#2').attr('id');
        //alert(id2);
        $('#confirmaToque2').click(function(){
            var selecao = document.querySelector('input[name=exampleRadios]:checked').value;
            //alert(idToque + id2 + selecao);

            $.ajax({
                type: 'POST',
                url: 'toque.php',
                data: {
                    selecao: selecao,
                    id_jogador_toque: id_jogador_toque,
                    id_jogador: selecao    
                    },
                beforeSend : function () {
                    console.log('carregando...');
                },
                success: function(){
                    //alert(id_jogador_toque + selecao)
                    alert('Sucesso!');
                }
            });

        });
    });

    $('#jogador3').click(function(event){
        event.preventDefault();
        const id_jogador_toque = $('#3').text();
        const id3 = $('#3').attr('id');
        //alert(id3);
        $('#confirmaToque3').click(function(){
            var selecao = document.querySelector('input[name=exampleRadios]:checked').value;
            //alert(idToque + id3 + selecao);

            $.ajax({
                type: 'POST',
                url: 'toque.php',
                data: {
                    selecao: selecao,
                    id_jogador_toque: id_jogador_toque,
                    id_jogador: selecao    
                    },
                beforeSend : function () {
                    console.log('carregando...');
                },
                success: function(){
                    //alert(id_jogador_toque + selecao)
                    alert('Sucesso!');
                }
            });
        });
    });

    $('#jogador4').click(function(event){
        event.preventDefault();
        const id_jogador_toque = $('#4').text();
        const id4 = $('#4').attr('id');
        alert(id4);
        $('#confirmaToque4').click(function(){
            var selecao = document.querySelector('input[name=exampleRadios]:checked').value;
            //alert(idToque + id4 + selecao);

            $.ajax({
                type: 'POST',
                url: 'toque.php',
                data: {
                    selecao: selecao,
                    id_jogador_toque: id_jogador_toque,
                    id_jogador: selecao    
                    },
                beforeSend : function () {
                    console.log('carregando...');
                },
                success: function(){
                    //alert(id_jogador_toque + selecao)
                    alert('Sucesso!');
                }
            });
        });
    });

    


    // BATIDA
    $('#confirmaBatida1').click(function(event){
        let selecao = document.querySelector('input[name=exampleRadios1]:checked').value;
        event.preventDefault();
        const idBatida = $('#1').text();
        const id1 = $('#1').attr('id');

        /*let checkbox = document.getElementById('exampleCheck1');
        if(checkbox.checked) {
            alert("O cliente marcou o checkbox");
        } else {
            console.log("O cliente não marcou o checkbox");
        }*/
        alert(idBatida +selecao);
    });

    $('#confirmaBatida2').click(function(event){
        let selecao = document.querySelector('input[name=exampleRadios1]:checked').value;
        event.preventDefault();
        const idBatida = $('#2').text();
        const id1 = $('#2').attr('id');
        alert(idBatida + selecao);
    });

    $('#confirmaBatida3').click(function(event){
        let selecao = document.querySelector('input[name=exampleRadios1]:checked').value;
        event.preventDefault();
        const idBatida = $('#3').text();
        const id1 = $('#3').attr('id');
        alert(idBatida + selecao);
    });

    $('#confirmaBatida4').click(function(event){
        let selecao = document.querySelector('input[name=exampleRadios1]:checked').value;
        event.preventDefault();
        const idBatida = $('#4').text();
        const id1 = $('#4').attr('id');
        alert(idBatida + selecao);
    });

});