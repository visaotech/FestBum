<?php

if (!isset($_SESSION["nomeusuario"])) {

  header("Location: ../visao/login.php?erro=usuario não logado!");
  exit;
}
if (isset($_SESSION['nome_cookie_login'])) {
  // Verifica se o cookie "novo_cookie" existe
  $tempo_expiracao_cookie =  $_SESSION['LAST_ACTIVITY'];

  $tempoMaximoSessao = 420; // Tempo máximo da sessão em segundos (30 minutos)
  if (time() > $tempo_expiracao_cookie) {
    // O tempo atual é maior que o tempo de expiração do cookie
    echo '<script type="text/javascript">
    alert("Sua sessão expirou. Por favor, faça login novamente.");
    window.location.href = "../controladora/logout.php"; // Redireciona para login.php
  </script>';
   
  }
}

?>