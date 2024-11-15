<?php
 // Inicia a sessão
/* session_start();

// Verifica se as variáveis de sessão estão definidas
if (!isset($_SESSION['usuario']) || !isset($_SESSION['nomeusuario'])) {
    // Se as variáveis não estão definidas, redireciona para a página de login
    header("Location: login.php?erro=1");  // Passando erro para a página de login, se necessário
    exit;
} 
 */
require_once '../controladora/conexao.php';
require_once '../modelo/Produto.php';
require_once '../repositorio/ProdutoRepositorio.php';

$produtoRepositorio = new ProdutoRepositorio($conn);
$produtos = $produtoRepositorio->buscarTodos();
?>

<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/admin.css">
  <link rel="stylesheet" href="../css/menu.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="../img/icone-serenatto.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Admin</title>
</head>

<body>
  <main>
    <section class="container-admin-banner">
      <!--<img src="../img/logo-ifsp-removebg.png" class="logo-admin" alt="logo-serenatto"> -->
      <!--<img class= "ornaments" src="../img/ornaments-coffee.png" alt="ornaments">-->
    </section>
    <h2>Lista de Produtos</h2>
    <?php if (isset($_POST['codcad'])) { ?>
      <label for="codigo">Produto cadastrado com sucesso!</label>
    <?php } ?>
    <section class="container-table">
      <table>
        <thead>
          <tr>
            <th>Produto</th>
            <th>Tipo</th>
            <th>Descricão</th>
            <th>Valor</th>
            <th colspan="2">Ação</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($produtos as $produto) : ?>
            <tr>
              <td><?= $produto->getNome();  ?></td>
              <td><?= $produto->getTipo();  ?></td>
              <td><?= $produto->getDescricao();  ?></td>
              <td>R$ <?= $produto->getPreco();  ?></td>
              <td>
                <form action="editar-produto.php" method="POST">
                  <input type="hidden" name="id" value="<?= $produto->getId(); ?>">
                  <input type="hidden" name="nomeusuario" value="<?= $_SESSION['nomeusuario']; ?>">
                  <input type="hidden" name="tipo" value="<?= $produto->getTipo(); ?>">
                  <input type="hidden" name="usuario" value="<?= $_SESSION['usuario']; ?>">
                  <input type="submit" class="botao-editar" value="Editar">
                </form>
              </td>
              <td>
                <form action="excluir-produto.php" method="POST">
                  <input type="hidden" name="id" value="<?= $produto->getId(); ?>">
                  <input type="hidden" name="nomeusuario" value="<?= $_SESSION['nomeusuario']; ?>">
                  <input type="hidden" name="tipo" value="<?= $produto->getTipo(); ?>">
                  <input type="hidden" name="usuario" value="<?= $_SESSION['usuario']; ?>">
                  <input type="submit" class="botao-excluir" value="Excluir">
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <form action="cadastrar-produto.php" method="POST">
        <input type="hidden" name="nomeusuario" value="<?= $_SESSION['nomeusuario']; ?>">
        <input type="hidden" name="usuario" value="<?= $_SESSION['usuario']; ?>">
        <input type="submit" class="botao-cadastrar" name="cadastrar" value="Cadastrar produto">
      </form>
      <form action="#" method="post">
        <input type="submit" class="botao-cadastrar" value="Baixar Relatório" />
      </form>
    </section>
  </main>
</body>

</html>
