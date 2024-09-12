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
        <li class="nav-item active"><a href="index.php">Início</a></li>
      </ul>

      <div class="icons">
        <a href="#" class="fas fa-heart"></a>
        <a href="login.php" class="fas fa-user"></a>
        <a href="#" class="fas fa-shopping-cart"></a>
      </div>
    </nav>
    </header>

    <!-- <main>
      <section class="container-admin-banner">
        <h1>Cadastro realizado com sucesso</h1>
      </section>

      <section class="container-form">
        <form action="login.php" method="post">
          <input type="submit" name="login" class="botao-cadastrar" value="Fazer login" />
        </form>
      </section>
    </main> -->

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
