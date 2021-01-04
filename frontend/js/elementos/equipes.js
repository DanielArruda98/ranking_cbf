function listarEquipes(id, equipe, logo, cor, cidade, uf) {

    retorno = `
        <div class="col-lg-3">
            <div class="card mb-4 border-left-${cor}">
                <div class="card-body card_equipe" id="card_equipe_${id}">
                    <div class="equipe escudo"><img src="frontend/images/escudos/${logo}" style="max-height: 50px; max-width: 50px;"></div>
                    <div class="equipe nome">
                        <div>${equipe}</div>
                        <div class="localizacao">${cidade} (${uf})</div>
                    </div>
                    <div class="equipe acoes">
                        <div class="row">
                            <button onclick="editarEquipe(${id})" class="btn btn-sm btn-primary botao">
                                <i class="fas fa-pen"></i>
                            </button>
                        </div>
                        <div class="row mt-1">
                            <button onclick="deletarEquipe(${id})" class="btn btn-sm btn-danger botao">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;

    return retorno;
}

/*

    <div class="equipe acoes">
        
    </div>

*/