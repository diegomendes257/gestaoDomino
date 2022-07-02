$(document).ready(function(){

    // TOQUE
    $('.btnToque').click(function(event){
        event.preventDefault();
        var nomeToque = $(this).attr('value');
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