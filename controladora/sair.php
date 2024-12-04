<?php
    require_once('UsuarioController.php');

    $usuarioController = new UsuarioController();
    $usuarioController->logout();

    header("Location: ../visao/index.php");
?>