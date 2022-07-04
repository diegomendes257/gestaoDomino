$(document).ready(function(){

    // TOQUE
    $('#jogador1').click(function(event){
        event.preventDefault();
        //const idToque = $('.id_usuario').text();
        const id1 = $('#1').attr('id');
        alert(id1);
        $('#confirmaToque1').click(function(){
            var selecao = document.querySelector('input[name=exampleRadios]:checked').value;
            alert(id1 + selecao);
        });
    });

    $('#jogador2').click(function(event){
        event.preventDefault();
        //const idToque = $('.id_usuario').text();
        const id2 = $('#2').attr('id');
        alert(id2);
        $('#confirmaToque2').click(function(){
            var selecao = document.querySelector('input[name=exampleRadios]:checked').value;
            alert(id2 + selecao);
        });
    });

    $('#jogador3').click(function(event){
        event.preventDefault();
        //const idToque = $('.id_usuario').text();
        const id3 = $('#3').attr('id');
        alert(id3);
        $('#confirmaToque3').click(function(){
            var selecao = document.querySelector('input[name=exampleRadios]:checked').value;
            alert(id3 + selecao);
        });
    });

    $('#jogador4').click(function(event){
        event.preventDefault();
        //const idToque = $('.id_usuario').text();
        const id4 = $('#4').attr('id');
        alert(id4);
        $('#confirmaToque4').click(function(){
            var selecao = document.querySelector('input[name=exampleRadios]:checked').value;
            alert(id4 + selecao);
        });
    });

    


    // BATIDA
    $('#confirmaBatida1').click(function(){
        let selecao = document.querySelector('input[name=exampleRadios1]:checked').value;

        /*let checkbox = document.getElementById('exampleCheck1');
        if(checkbox.checked) {
            alert("O cliente marcou o checkbox");
        } else {
            console.log("O cliente não marcou o checkbox");
        }*/
        alert(selecao);
    });

    $('#confirmaBatida2').click(function(){
        let selecao = document.querySelector('input[name=exampleRadios1]:checked').value;
        alert(selecao);
    });

    $('#confirmaBatida3').click(function(){
        let selecao = document.querySelector('input[name=exampleRadios1]:checked').value;
        alert(selecao);
    });

    $('#confirmaBatida4').click(function(){
        let selecao = document.querySelector('input[name=exampleRadios1]:checked').value;
        alert(selecao);
    });

});