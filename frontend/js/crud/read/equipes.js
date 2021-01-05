listar();

function listar() {
    var dados = {
        listar: true
    }

    $.get(getApi('Equipe'), dados, function (retorno) {  
        var lista = "";
        
        $.each(retorno, function(idx, value) {
            lista += listarEquipes(value.id, value.equipe, value.logo, value.cor, value.cidade, value.uf);
        });

        if(lista == "") {
            lista += listarEquipes(null, "Nenhuma equipe encontrada"); 
        }

        $('#tbody_equipes').html(lista);
        hoverEquipe();
    });
}

function hoverEquipe() {
    $('.card_equipe').hover(function() {
        var id = $(this).attr('id');
        $(`#${id} .equipe.acoes`).show('fast');
    }, function() {
        var id = $(this).attr('id');
        $(`#${id} .equipe.acoes`).fadeOut('slow');
    });
}