function deletarEquipe(id_equipe) {
   
    var dados = {
        deletar : true,
        id_equipe
    }

    $.post(getApi('Equipe'), dados, function (retorna) {
        if(retorna.tipo == "success") {
            alert("Sucesso");
            listar();
        } else {
            alert("Erro ao deletar equipe");
        }
    });
}