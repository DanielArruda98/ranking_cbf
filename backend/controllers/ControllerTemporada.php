<?php
    require_once "../functions/headers.php";

    require_once "../models/Temporadas.class.php";

    $temporadas = new Temporadas(); 

    if(isset($_POST['cadastrar'])) {
        $ano = $_POST['ano'];

        $retorno = $temporadas->cadastrar($ano);
        echo json_encode($retorno);
    }

    if(isset($_GET['listar'])) {
        $retorno = $temporadas->listar();
        echo json_encode($retorno);
    }