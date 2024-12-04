<?php
    require_once('UsuarioController.php');

    if (isset($_REQUEST['submit'])) {
        $nome = $_REQUEST['nome'];
        $sobrenome = $_REQUEST['sobrenome'];
        $email = $_REQUEST['email'];

        $usuarioController = new UsuarioController();
        $usuarioController->atualizaCadastro($nome, $sobrenome, $telefone, $email);
    }