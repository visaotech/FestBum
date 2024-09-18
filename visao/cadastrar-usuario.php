<!DOCTYPE html>
<html lang="">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fest Bum - Personalizados</title>
  <link rel="shortcut icon" href="./assets/images/logo/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="../assets/css/estilo.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
</head>

  <body>

  <header>
      <div class="header-top">
        <div class="container">
          <ul class="header-social-container">
            <li>
              <a href="https://www.instagram.com/festbum_personalizados/" class="social-link">
                <ion-icon name="logo-instagram"></ion-icon>
              </a>
            </li>
            <li> 
              <a href="#" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>
            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>
          </ul>
          <div class="header-alert-news">
            <p>
              <b>FRETE PERSONALIZADO</b>
              PARA ENCOMENDAS
            </p>
          </div>
          </div>
        </div>
      </div>
      <div class="header-main">
        <div class="container">
          <a href="#" class="header-logo">
            <img src="../assets/images/logo/logo.svg" alt="Anon's logo" width="120" height="36">
          </a> 
          <div class="header-user-actions">
            <a href="login.php">
              <button class="action-btn">
                <ion-icon name="person-outline"></ion-icon>
              </button>
            </a>
            <a href="cadastrar-usuario.php">
              <button class="action-btn">
                <ion-icon name="heart-outline"></ion-icon>
                <span class="count">0</span>
              </button>
            </a>
            
            <!-- <a href=".php"></a> -->
              <button class="action-btn">
                <ion-icon name="bag-handle-outline"></ion-icon>
                <span class="count">0</span>
              </button>
            </a>
          </div>
        </div>
      </div>
  <heder>

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