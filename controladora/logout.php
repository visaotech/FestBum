<?php
// Inicia a sessão (se já não estiver iniciada)
session_start();

// Destroi todas as variáveis de sessão
$_SESSION = array();

// Se necessário, também é boa prática apagar o cookie da sessão
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Destroi a sessão
session_destroy();

// Redireciona para a página de login ou para onde for apropriado após o logout
header("Location: ../visao/login.php");
exit;
?>