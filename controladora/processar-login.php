<?php
require "conexao.php";
require "Autenticacao.php";

// Verifica se o método de requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos de e-mail e senha estão definidos e não estão vazios
    if (!isset($_POST["email"]) || !isset($_POST["senha"]) || empty($_POST["email"]) || empty($_POST["senha"])) {
        header("Location: ../visao/login.php?erro=1");
        exit();
    }

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Cria uma instância da classe autenticacao
    $login = new autenticacao($conn);
    $usuario = $login->verificarUsuario($email, $senha);

    if ($usuario) {
        // Gera um token de 16 bytes (32 caracteres hexadecimais)
        $token = bin2hex(random_bytes(16));
        $tempo_expiracao = time() + 420; // 7 minutos

        // Define o cookie com o token e tempo de expiração
        setcookie("cookieRenato", $token, $tempo_expiracao, "/");

        // Inicia a sessão e armazena dados
        session_start();
        $_SESSION['LAST_ACTIVITY'] = $tempo_expiracao;
        $_SESSION['nome_cookie_login'] = $token;

        $_SESSION["usuario"] = true;
        $_SESSION["nomeusuario"] = $usuario["nome"];

        // Redireciona para a página index.html com parâmetros de query string
        header("Location: ../index.php?cookie={$token}&tempo={$tempo_expiracao}");
        exit();
    } else {
        // Redireciona com mensagem de erro
        header("Location: ../visao/login.php?erro=1");
        exit();
    }
} else {
    // Redireciona se o método de requisição não for POST
    header("Location: ../visao/login.php");
    exit();
}
?>
