<?php
    require_once "../functions/headers.php";

    require_once "../models/Cidades.class.php";

    $cidades = new Cidades(); 

    if(isset($_POST['cadastrar'])) {
        $nome = $_POST['nome'];
        $estado = $_POST['estado'];

        $retorno = $cidades->cadastrar($nome, $estado);
        echo json_encode($retorno);
    }

    if(isset($_GET['listar'])) {
        $estado = $_GET['estado'];

        $retorno = $cidades->listar($estado);
        echo json_encode($retorno);
    }