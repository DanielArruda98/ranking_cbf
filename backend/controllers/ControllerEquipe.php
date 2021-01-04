<?php
    require_once "../functions/headers.php";

    require_once "../models/Equipes.class.php";

    $equipes = new Equipes();

    if(isset($_POST['cadastrar'])) {
        $nome = $_POST['nome'];
        $sigla = $_POST['sigla'];
        $logo = $_POST['logo'];
        $cor = $_POST['cor'];
        $cidade = $_POST['cidade'];

        $retorno = $equipes->cadastrar($nome, $sigla, $logo, $cor, $cidade);
        echo json_encode($retorno);
    }

    if(isset($_GET['listar'])) {
        $retorno = $equipes->listar();
        echo json_encode($retorno);
    }

    if(isset($_GET['consultar'])) {
        $id_equipe = $_GET['id_equipe'];

        $retorno = $equipes->consultar($id_equipe);
        echo json_encode($retorno);
    }

    if(isset($_POST['deletar'])) {
        $id_equipe = $_POST['id_equipe'];

        $retorno = $equipes->deletar($id_equipe);
        echo json_encode($retorno);
    }

    if(isset($_POST['atualizar'])) {
        $id_equipe = $_POST['id_equipe'];
        $nome = $_POST['nome'];
        $sigla = $_POST['sigla'];
        $logo = $_POST['logo'];
        $cor = $_POST['cor'];
        $cidade = $_POST['cidade'];

        $retorno = $equipes->atualizar($id_equipe, $nome, $sigla, $logo, $cor, $cidade);
        echo json_encode($retorno);
    }