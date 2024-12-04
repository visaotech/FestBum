
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="w-100 m-auto form-container">
        <form action="../controladora/login_process.php" method="post">
            <img src="../assets/images/logo/favicon.png" alt="Logo" class="mb-4" />
            <h1 class="h3 mb-3 fw-normal">Por favor, faça login</h1>
            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="email" placeholder="seu-email@gmail.com" required />
                <label for="email">Adicione o E-mail</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="senha" class="form-control" id="senha" placeholder="Senha" required />
                <label for="senha">Senha</label>
            </div>
            <div class="form-check text-start my-3">
                <input type="checkbox" class="form-check-input" id="flexCheckDefault" />
                <label class="form-check-label" for="flexCheckDefault">Lembrar de mim</label>
            </div>
            <div class="forgot">
                 <small><a href="#">Esqueceu a senha?</a></small>
             </div>
             <div> 
                <button class="btn btn-primary w-100 py-2"  type="submit" name="submit" value="Enviar">Entrar</button>
             </div>
             <div>
                <?php echo ((isset($_REQUEST['msg']) ? $_REQUEST['msg'] : "") )?>
            </div>
            <div class="text-center mt-3">
                 <small>Não tem uma conta? <a href="register.php">Cadastre-se</a></small>
            </div>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

