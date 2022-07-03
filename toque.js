$(document).ready(function(){

    // TOQUE
    $('.btnToque').click(function(event){
        event.preventDefault();
        const idToque = $('.id_usuario').text();
        var jogador1 = $('.id_usuario').attr('value');
        alert(jogador1);
        $('#confirmaToque').click(function(){
            var selecao = document.querySelector('input[name=exampleRadios]:checked').value;
            console.log(nomeToque + selecao);
        });
    });





    
    // BATIDA
    $('#confirmaBatida').click(function(){
        var selecao = document.querySelector('input[name=exampleRadios1]:checked').value;
        alert(selecao);
    });

});