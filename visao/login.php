<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fest Bum</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <header>
    <nav id="navbar">
      <input type="checkbox" name="" id="toggler">
      <label for="toggler" class="fas fa-bars"></label>
      <a href="#" class="logo">FestBum<span></span></a>

      <ul id="nav_list">
        <li class="nav-item active"><a href="../index.php">Início</a></li>
      </ul>

      <div class="icons">
        <a href="#" class="fas fa-heart"></a>
        <a href="login.php" class="fas fa-user"></a>
        <a href="#" class="fas fa-shopping-cart"></a>
      </div>
    </nav>
  </header>
  <main>
    <section class="container-admin-banner">
      <h1>Login</h1>
    </section>
    <div class="form-container">
      <form action="../controladora/processar-login.php" method="post">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" placeholder="Digite o seu e-mail" required>
        <br><br>
        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" placeholder="Digite a sua senha" required>
        <br>
        <input type="submit" class="botao-cadastrar" name="entrar" value="Entrar">
        <?php if (isset($_GET["erro"])): ?>
        <br>
        <label style="color: red;">Usuário ou senha inválidos</label>
        <?php endif; ?>
      </form>
    </div>
    <br>
    <div class="form-container">
      <form action="cadastrar-usuario.php" method="post">
        <input type="submit" name="cadastro" class="botao-cadastrar" value="Cadastrar">
      </form>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <footer class="footer">
      <div class="footer-container">
        <p>&copy; 2024 FestBum. Todos os direitos reservados</p>
      </div>
    </footer>
  </main>
</body>
</html>
