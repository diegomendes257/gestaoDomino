$(document).ready(function(){

    // TOQUE
    $('.btnToque').click(function(event){
        event.preventDefault();
        const nomeToque = $('.nome').attr('value');
        alert(nomeToque);
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