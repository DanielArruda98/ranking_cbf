listar();

function listar() {
    var dados = {
        listar: true
    }

    $.get(getApi('Temporada'), dados, function (retorno) {  
        var lista = "";
        var contadora = 1;

        $.each(retorno, function(idx, value) {
            lista += listarTemporada(value.id, value.ano, contadora++);
        });

        $('#tbody_temporadas').html(lista);
        hoverTemporada();
    });
}

function hoverTemporada() {
    $('.card_temporada').hover(function() {
        $(this).removeClass('border-left-dark');
        $(this).addClass('border-left-info');
    }, function() {
        $(this).removeClass('border-left-info');
        $(this).addClass('border-left-dark');
    });
}

function openTemporada(id, ano) {
    $("#window-view").load("frontend/pages/temporadas/competicoes.html");
}