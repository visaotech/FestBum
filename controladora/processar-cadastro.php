<?php
include 'conexao.php'; // Verifique se o caminho está correto
include '../modelo/Usuario.php';
include '../repositorio/UsuarioRepositorio.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se os dados foram recebidos
    if (empty($_POST)) {
        echo "Nenhum dado POST recebido.";
        exit();
    }

    // Usar isset para evitar avisos de chave indefinida
    $primeironome = isset($_POST["primeironome"]) ? $_POST["primeironome"] : '';
    $sobrenome = isset($_POST["sobrenome"]) ? $_POST["sobrenome"] : '';
    $cidade = isset($_POST["cidade"]) ? $_POST["cidade"] : '';
    $estado = isset($_POST["estado"]) ? $_POST["estado"] : '';
    $cep = isset($_POST["cep"]) ? $_POST["cep"] : '';
    $email = isset($_POST["email"]) ? $_POST["email"] : '';
    $senha = isset($_POST["senha"]) ? $_POST["senha"] : '';
    $confirmarsenha = isset($_POST["confirmarsenha"]) ? $_POST["confirmarsenha"] : '';

    if ($senha === $confirmarsenha) {
        // Criação do objeto usuário
        $usuario = new Usuario(0, $primeironome, $sobrenome, $cidade, $estado, $cep, $email, $senha);
        $usuarioRepositorio = new UsuarioRepositorio($conn);

        // Cadastrar o usuário
        if ($usuarioRepositorio->cadastrar($usuario)) {
            header("Location: ../visao/cadastrar-usuario-sucesso.php");
            exit();
        } else {
            echo "Erro! Tente novamente!";
        }
    } else {
        header("Location: ../visao/cadastrar-usuario.php?erro=1");
        exit();
    }
}
?>
