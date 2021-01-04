iniciarCadastro();

$('#btn-cadastrar_equipe').click(function () {

    var fd = new FormData();
    var files = $('#escudo_upload')[0].files;

    if (files.length > 0) {
        fd.append('escudo', true);
        fd.append('file', files[0]);

        $.ajax({
            url: 'frontend/php/upload.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function (response) {
                if(response) {
                    var equipe = JSON.parse(response);
                    cadastrarEquipe(equipe.logo);
                } else {
                    alert("erro");
                }
            },
        });
    } else {
        alert("Selecione um escudo");
    }
});

function cadastrarEquipe(logo) {
    var nome = $('#nome').val();
    var sigla = $('#sigla').val();
    var cor = $('#cor').val();
    var cidade = $('#cidade').val();

    var dados = {
        cadastrar : true,
        nome,
        sigla,
        cor,
        cidade,
        logo
    }

    $.post(getApi('Equipe'), dados, function (retorna) {
        if(retorna.tipo == "success") {
            alert("Sucesso");
            $('#nome').val('');  
            $('#sigla').val(''); 
            $('#cor').val('');  
            $('#cidade').val(''); 
            $('#escudo_upload').val('');
            $('#escudo_view').attr('src', 'frontend/images/escudo_default.png');
        } else {
            alert("Erro ao cadastrar equipe");
        }
    });
}

function iniciarCadastro() {
    selectEstado('#estado');
    selectCidade('#cidade', $('#estado').val());

    $('#estado').change(function() {
        selectCidade('#cidade', $(this).val());
    });
}

$('#adicionar_cidade').click(function() {
    var estado = $('#estado').val();
    var nome = $('#nova_cidade').val();

    var dados = {
        cadastrar : true,
        nome,
        estado
    }

    $.post(getApi('Cidade'), dados, function (retorna) {
        if(retorna.tipo == "success") {
            alert("Sucesso");
            $('#nova_cidade').val('');
            selectCidade('#cidade', $('#estado').val());
        } else {
            alert("Erro ao cadastrar cidade");
        }
    });
});