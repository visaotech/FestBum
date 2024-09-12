<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fest Bum</title>
  <link rel="icon" href="../img/icon.webp" type="image/x-icon">
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
    <div class="container-form">
    <section class="container-admin-banner">
        <h1>Cadastro</h1>
    </section>

      <form method="post" action="../controladora/processar-cadastro.php">
          <label for="nome">Nome</label>
          <input type="text" id="nome" name="nome" 
          placeholder="Digite o nome do produto" required>
          <br>
          <label for="email">e-mail</label>
          <input type="email" id="email" name="email" 
          placeholder="Digite seu email" required>
          <br>
          <label for="senha">Senha</label>
          <input type="password" id="senha" name="senha" 
          placeholder="Digite uma senha" required>
         <br>
          <label for="confirmarsenha">Confirmar Senha</label>
          <input type="password" id="confirmarsenha" name="confirmarsenha" 
          placeholder="Digite uma senha" required>
        <?php 
          if(isset($_GET["erro"])){
              //echo "erro! senha e confirmar senha não são iguais";
          ?>
              <label for="erro">Senha e confirmar senha não são iguais</label>
          <?php } ?>

          <input type="submit" name="cadastro" class="botao-cadastrar" 
          value="Cadastrar usuario"/>
      </form>
    </div> 

    </section>
  </main>

</body>
</html>
