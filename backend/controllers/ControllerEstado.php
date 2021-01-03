<?php
    require_once "../functions/headers.php";

    require_once "../models/Estados.class.php";

    $estados = new Estados(); 

    if(isset($_GET['listar'])) {
        $retorno = $estados->listar();
        echo json_encode($retorno);
    }