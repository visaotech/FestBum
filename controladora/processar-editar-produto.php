<?php
session_start();
require_once "conexao.php";
require '../visao/menu.php';
require '../repositorio/ProdutoRepositorio.php';
require '../modelo/Produto.php';

// Instanciando o repositório de produtos
$produtosRepositorio = new ProdutoRepositorio($conn);

if (isset($_POST['editar'])) {

    // Convertendo o valor de preco para float, considerando vírgula como separador decimal
    $preco = str_replace(',', '.', $_POST['preco']);
    $preco = (float) $preco;

    // Criando o objeto Produto
    $produto = new Produto($_POST['id'], 
                           $_POST['tipo'], 
                           $_POST['nomeP'], 
                           $_POST['descricao'], 
                           $preco);

    // Verificando se uma nova imagem foi carregada
    if (isset($_FILES['imagem']['name']) && ($_FILES['imagem']['error'] == 0)) {
        // Gerando um nome único para a imagem
        $produto->setImagem(uniqid() . $_FILES['imagem']['name']);
        // Movendo o arquivo para o diretório de imagens
        move_uploaded_file($_FILES['imagem']['tmp_name'], $produto->getImagemDiretorio());
    } elseif ($_FILES['imagem']['error'] == UPLOAD_ERR_NO_FILE) {
        // Caso nenhum arquivo tenha sido enviado, mantemos a imagem em branco
        $produto->setImagem('');
    }

    // Atualizando o produto no banco de dados
    $produtosRepositorio->atualizarProduto($produto);

    // Coletando dados adicionais para o redirecionamento
    $imagem = $_FILES['imagem']['name'];
    $imagemError = $_FILES['imagem']['error'];
    $nomeusuario = $_POST['nomeusuario'];
    $usuario = $_POST['usuario'];

    // Redirecionando para a página de administração com os dados do produto
    echo "<form id='redirectForm' action='../visao/admin.php' method='POST'>";
    echo "<input type='hidden' name='id' value='{$_POST['id']}'>";
    echo "<input type='hidden' name='tipo' value='{$_POST['tipo']}'>";
    echo "<input type='hidden' name='nomeP' value='{$_POST['nomeP']}'>";
    echo "<input type='hidden' name='nomeusuario' value='{$nomeusuario}'>";
    echo "<input type='hidden' name='usuario' value='{$usuario}'>";
    echo "<input type='hidden' name='descricao' value='{$_POST['descricao']}'>";
    echo "<input type='hidden' name='preco' value='{$_POST['preco']}'>";
    echo "<input type='hidden' name='imagemNome' value='{$imagem}'>";
    echo "<input type='hidden' name='imagemError' value='{$imagemError}'>";
    echo "</form>";
    echo "<script>document.getElementById('redirectForm').submit();</script>";

}
?>
