<?php
// Verifique se a sessão já foi iniciada antes de chamar session_start()
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Menu do Usuário</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="menu">
    <div class="user-info dropdown">
      <div class="user-photo">
        <img src="..\assets\images\testimonial-3_1.jpg" alt="Foto do Usuário">
      </div>
      <div class="user-name">
        <?php
        // Check if the session variable is set before accessing it
        if (isset($_SESSION["nomeusuario"])) {
          echo $_SESSION["nomeusuario"];
        } else {
          // Display a placeholder or redirect if the user is not logged in
          echo "Usuário não autenticado";
        }
        ?>
      </div>

      <div class="dropdown-content">
        <form id="inicioForm" action="./index.php" method="post" style="display: none;">
          <input type="hidden" name="usuario" value="<?php echo isset($_SESSION['usuario']) ? $_SESSION['usuario'] : ''; ?>">
          <input type="hidden" name="nomeusuario" value="<?php echo isset($_SESSION['nomeusuario']) ? $_SESSION['nomeusuario'] : ''; ?>">
        </form>
        <a class="dropdown-item" href="#" onclick="enviarParaInicio();">Início</a>

        <a class="dropdown-item" href="editar-produto.php">Configurações</a>

        <form id="adminForm" action="admin.php" method="post" style="display: none;">
          <input type="hidden" name="usuario" value="<?php echo isset($_SESSION['usuario']) ? $_SESSION['usuario'] : ''; ?>">
          <input type="hidden" name="nomeusuario" value="<?php echo isset($_SESSION['nomeusuario']) ? $_SESSION['nomeusuario'] : ''; ?>">
        </form>
        <a class="dropdown-item" href="#" onclick="enviarParaAdmin();">Admin</a>

        <a class="dropdown-item" href="#" onclick="logout();">Sair</a>
      </div>
    </div>
  </div>

  <script>
    function enviarParaAdmin() {
      document.getElementById('adminForm').submit();
    }

    function voltar() {
      window.history.back(); // This returns to the previous page in browser history
    }

    function enviarParaInicio() {
      document.getElementById('inicioForm').submit();
    }

    function logout() {
      // Here you can add logic to end the session
      // Assuming you're using session cookies:
      <?php session_destroy(); ?>

      // Redirect to the login page
      window.location.href = 'login.php';
    }
  </script>
</body>

</html>
