<?php
session_start();
require "conexao.php";
require "../modelo/Produto.php";
require "../repositorio/ProdutoRepositorio.php";

// Se a requisição for via POST (quando o formulário for submetido)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $nome = $_POST["nomeP"];
    $tipo = $_POST["tipo"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $imagem = $_FILES['imagem']['name'];  // Nome original da imagem

    // Recupera os dados do usuário da sessão
    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['nomeusuario'] = $_POST['nomeusuario'];

    // Criação do objeto Produto
    $produto = new Produto(
        NULL,            // ID do produto será NULL (será gerado no banco)
        $tipo,           // Tipo
        $nome,           // Nome
        $descricao,      // Descrição
        $preco,          // Preço
        $imagem          // Nome da imagem
    );

    // Caminho onde a imagem será salva
    $uploadDir = __DIR__ . "/../assets/images/";  // Pasta de destino
    $uploadFile = $uploadDir . uniqid() . $_FILES['imagem']['name'];  // Gera um nome único para o arquivo

    // Verifica se o diretório de upload existe e é gravável
    if (!is_dir($uploadDir)) {
        echo "Erro: O diretório de upload 'assets/images' não existe.";
        exit;
    }

    if (!is_writable($uploadDir)) {
        echo "Erro: O diretório de upload 'assets/images' não tem permissão para escrita.";
        exit;
    }

    // Verifica se o arquivo foi enviado corretamente
    if ($_FILES['imagem']['error'] == 0) {
        // Move o arquivo para o diretório de upload
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadFile)) {
            echo "Arquivo carregado com sucesso!";
            // Atualiza o caminho da imagem no objeto Produto
            $produto->setImagem($uploadFile);  // Define o caminho completo da imagem
        } else {
            echo "Erro ao mover o arquivo para o diretório de destino.";
        }
    } else {
        echo "Erro no upload do arquivo.";
    }

    // Instancia o repositório de produtos e tenta cadastrar o novo produto
    $produtoRepositorio = new ProdutoRepositorio($conn);
    $sucess = $produtoRepositorio->cadastrar($produto);  // Chama o método cadastrar

    if ($sucess) {
        // Se o cadastro foi bem-sucedido, gera um código de confirmação e redireciona para a página admin
        $codcad = rand(0, 1000000);
        echo "<form id='redirectForm' action='../visao/admin.php' method='POST'>";
        echo "<input type='hidden' name='codigo' value='$codcad'>";
        echo "<input type='hidden' name='nomeusuario' value=" . $_SESSION['nomeusuario'] . ">";
        echo "<input type='hidden' name='usuario' value=" . $_SESSION['usuario'] . ">";
        echo "</form>";
        echo "<script>document.getElementById('redirectForm').submit();</script>";
    } else {
        echo "Erro ao cadastrar produto.";
    }
}
?>
