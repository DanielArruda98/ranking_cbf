function listarPreEquipes(escudo) {
    retorno = `
        <div class="centralizar float-left">
            <img src="frontend/images/escudos/${escudo}">
        </div>
    `;

    return retorno;
}

function listarPreEquipesPlus() {
    retorno = `
        <div class="centralizar float-left">
            <i class="fas fa-plus"></i>
        </div>
    `;

    return retorno;
}

function classificar(id, nome, escudo, posicao) {
    retorno = `
        <div class="card-classificacao">
            <div class="numero centralizar">
                ${posicao}
            </div>
            <div class="card-equipe-classificacao">
                <div class="escudo centralizar">
                    <img src="frontend/images/escudos/${escudo}">
                </div>
                <div class="nome centralizar">
                    ${nome}
                </div>
            </div>
        </div>
    `;

    return retorno;
}