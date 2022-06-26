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


    // SELEÇÃO DE DUPLA
    $('#jogadores').click(function(){
        alert('diego');
	});

});