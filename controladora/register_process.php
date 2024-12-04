<?php
require_once('UsuarioController.php');

// Verifica se o formulário foi enviado
if (isset($_REQUEST['submit'])) {
    // Pegando os dados do formulário
    $nome = $_POST['primeironome'];        // Usando o nome correto da variável
    $sobrenome = $_POST['sobrenome'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);  // Hash da senha
    $sexo = $_POST['sexo'];
    $data_nascimento = $_POST['data_nascimento'];
    
    // Instanciando o controlador de usuário
    $usuarioController = new UsuarioController();
    
    // Chama o método cadastrar para inserir os dados no banco
    $usuarioController->cadastrar($nome, $sobrenome, $cidade, $estado, $cep, $email, $senha, $sexo, $data_nascimento);
}
?>
