function listarTemporada(id, ano, contadora) {
    var div_menu = `<div class="row col-9 justify-content-md-center">`;
    var retorno = "";

    if(contadora == 1)
        retorno += div_menu;

    retorno += `
        <div class="col-lg-2">
            <div class="card mb-4 py-3 border-left-dark text-center font-weight-bold card_temporada" onclick="openTemporada(${id}, ${ano})">
                ${ano}
            </div>
        </div>
    `;

    if(contadora%5 == 0)
        retorno += "</div>"+div_menu;

    return retorno;
}