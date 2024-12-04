<?php
    require_once('UsuarioController.php');

    if(isset($_POST['submit']) && !empty($_REQUEST['email']) && !empty($_REQUEST['senha'])) {
        $email = $_REQUEST['email'];
        $senha = $_REQUEST['senha'];

        $usuarioController = new UsuarioController();
        $usuarioController->login($email, $senha);

    } else {
        // header('Location: ../view/home.php');
        header('Location: ../visao/login.php?msg=Usuário ou senha incorretos.');
     }
?>
