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

      <!-- Modal de Sucesso -->
      <div id="successModal" class="modal">
        <div class="modal-content">
          <h2>Sucesso!</h2>
          <p>Cadastro realizado com sucesso. Você pode agora fazer login.</p>
          <button class="btn-close-modal" id="closeModalBtn">Fazer login</button>
        </div>
      </div>

      <script>
        // Exibir o modal ao carregar a página
        window.onload = function() {
          var modal = document.getElementById("successModal");
          var closeBtn = document.getElementById("closeModalBtn");

          // Exibe o modal
          modal.style.display = "block";

          // Redireciona para a página de login ao clicar no botão "Fazer login"
          closeBtn.onclick = function() {
            window.location.href = "login.php";
          };
        };
      </script>
</body>
</html>