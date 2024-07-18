<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $idUsuario = $_POST['idUsuario'];
    $nomeUsuario = $_POST['nomeUsuario'];
    $idPerfil = $_POST['idPerfil'];
    $telefoneCelular = $_POST['telefoneCelular'];
    $emailUsuario = $_POST['emailUsuario'];

    include_once "atendController.php";

    $controller = new atendController();

    $resultado = $controller->alterarUsuario($idUsuario, $nomeUsuario, $idPerfil, $telefoneCelular, $emailUsuario);

    if ($resultado) {    
        header( 'Location: ../view/alterarUsuario.php?id=' . $idUsuario);
        exit();
    } else {
        echo "Erro ao processar a alteração.";
    }
}
?>
