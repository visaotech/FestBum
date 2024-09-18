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
    <div class="form-container">
    <section class="container-admin-banner">
      <h1>Login</h1>
    </section>
    
      <form action="../controladora/processar-login.php" method="post">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
        <br><br>
        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
        <br>

        <input type="submit" class="botao-cadastrar" name="entrar" value="Entrar">

        <?php if (isset($_GET["erro"])): ?>
          <br>
          <label style="color: red;">Usuário ou senhas inválidas</label>
        <?php endif; ?>
      </form>
    </div>

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
    <div class="footer-nav">

      <div class="container">

        <ul class="footer-nav-list">

          <li class="footer-nav-item">
            <h2 class="nav-title">Produtos Populares</h2>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Tag Personalizada</a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Garrafa Personalizada</a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Livro de colorir</a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Sacolinha personalizada</a>
          </li>


        </ul>

        <ul class="footer-nav-list">
        
          <li class="footer-nav-item">
            <h2 class="nav-title">Produtos</h2>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Lápis personalizado</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Polaroid</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Balões</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Embalagens</a>
          </li>
        
        </ul>

        <ul class="footer-nav-list">
        
          <li class="footer-nav-item">
            <h2 class="nav-title">Nossa Empresa</h2>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Entrega para todo Brasil</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Segurança e praticidade</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Itens Personalizados</a>
          </li>
        
        
        </ul>

        <ul class="footer-nav-list">
        
          <li class="footer-nav-item">
            <h2 class="nav-title">Serviços</h2>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Decoração</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Embalagens</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Adesivos</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Kits</a>
          </li>

        
        </ul>

        <ul class="footer-nav-list">

          <li class="footer-nav-item">
            <h2 class="nav-title">Contato</h2>
          </li>

          <li class="footer-nav-item flex">
            <div class="icon-box">
              <ion-icon name="location-outline"></ion-icon>
            </div>

            <address class="content">
              Rua Irmã Dulce, 11 - Santa Maria, 
              Osaco, SP 
              06149-217
            </address>
          </li>

          <li class="footer-nav-item flex">
            <div class="icon-box">
              <ion-icon name="call-outline"></ion-icon>
            </div>

            <a href="tel:+607936-8058" class="footer-nav-link"> WhatsApp - (11) 94826-8791</a>
          </li>

          <li class="footer-nav-item flex">
            <div class="icon-box">
              <ion-icon name="mail-outline"></ion-icon>
            </div>

            <a href="mailto:example@gmail.com" class="footer-nav-link">festbumbaloespersonalizados@gmail.com</a>
          </li>

        </ul>

        <ul class="footer-nav-list">

          <li class="footer-nav-item">
            <h2 class="nav-title">Follow Us</h2>
          </li>

          <li>
            <ul class="social-link">

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-facebook"></ion-icon>
                </a>
              </li>

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-twitter"></ion-icon>
                </a>
              </li>

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-linkedin"></ion-icon>
                </a>
              </li>

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-instagram"></ion-icon>
                </a>
              </li>

            </ul>
          </li>

        </ul>

      </div>

    </div>

    <div class="footer-bottom">

      <div class="container">

        <img src="./assets/images/payment.png" alt="payment method" class="payment-img">

        <p class="copyright">
          Copyright &copy; <a href="#">Fest Bum</a> all rights reserved.
        </p>

      </div>

    </div>

  </footer>






  <!--
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  </body>
  </html>