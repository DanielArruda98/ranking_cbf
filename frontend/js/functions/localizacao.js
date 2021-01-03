function selectEstado(saida) {
    var dados = {
        listar : true
    }

    $.get(getApi('Estado'), dados, function (retorno) {  
        var lista = "";
        
        $.each(retorno, function(idx, value) {
            lista += gerarOption(value.id, value.nome);
        });

        $(saida).html(lista);
    });
}

function selectCidade(saida, estado) {
    var dados = {
        listar : true,
        estado
    }

    $.get(getApi('Cidade'), dados, function (retorno) {  
        var lista = "";
        
        $.each(retorno, function(idx, value) {
            lista += gerarOption(value.id, value.nome);
        });

        if(lista == "") {
            lista = gerarOption(null, "Nenhuma cidade cadastrada");
        }

        $(saida).html(lista);
    });
}