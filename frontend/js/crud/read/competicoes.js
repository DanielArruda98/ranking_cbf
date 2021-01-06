$('#ano_temporada').text(localStorage.getItem('ano_temporada'));
$('#competicao_selecionada').text(localStorage.getItem('competicao_selecionada'));

var competicoes = {
    'copa_do_brasil' : 'Copa do Brasil',
    'serie_a' : 'Brasileirão Série A',
    'serie_b' : 'Brasileirão Série B',
    'serie_c' : 'Brasileirão Série C',
    'serie_d' : 'Brasileirão Série D'
}

$('.card_competicao').click(function() {
    var select = $(this).attr('id');

    localStorage.setItem('competicao_selecionada', competicoes[select]);
    $("#window-view").load("frontend/pages/temporadas/classificacao.html");
});

// Funções de Voltar

$('.voltar_classificacao').click(function() {
    $("#window-view").load("frontend/pages/temporadas/competicoes.html");
});

$('.voltar_competicoes').click(function() {
    $("#window-view").load("frontend/pages/temporadas/read.html");
});

// Listar

var equipes = [
    {
        'id' : 1, 
        'nome' : 'Vasco',
        'logo' : 'vasco.png'
    },
    {
        'id' : 2, 
        'nome' : 'Flamengo',
        'logo' : 'flamengo.png'
    },
    {
        'id' : 3, 
        'nome' : 'Fluminense',
        'logo' : 'fluminense.png'
    },
    {
        'id' : 4, 
        'nome' : 'Botafogo',
        'logo' : 'botafogo.png'
    }
];

// Listar Pré-Escudos
var lista = "";

$.each(equipes, function(idx, value) {
    lista += listarPreEquipes(value.logo);
})

lista += listarPreEquipesPlus();

$('#tbody_preequipes').html(lista);

// Classificação
var classificacao = "";
var contadora = 1;

$.each(equipes, function(idx, value) {
    classificacao += classificar(value.id, value.nome, value.logo, contadora++);
})

$('#tbody_classificacao').html(classificacao);