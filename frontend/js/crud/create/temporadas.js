$('#btn-cadastrar_temporada').click(function () {
    var ano = $('#ano').val();

    var dados = {
        cadastrar : true,
        ano
    }

    $.post(getApi('Temporada'), dados, function (retorna) {
        if(retorna.tipo == "success") {
            alert("Sucesso");
            $('#ano').val('');
        } else {
            alert("Erro ao cadastrar temporada");
        }
    });
});