function listarEquipes(id, equipe, logo, cidade, uf) {
    
    retorno = `
        <tr>
            <td>${id}</td>
            <td><img src="frontend/images/escudos/${logo}" style="max-height: 50px; max-width: 50px;"></td>
            <td>${equipe}</td>
            <td>${cidade}/${uf}</td>
            <td>
                <button onclick="editarEquipe(${id})">Editar</button>
            </td>
            <td>
                <button onclick="deletarEquipe(${id})">Excluir</button>
            </td>
        </tr>
    `;

    return retorno;
}