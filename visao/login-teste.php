<!DOCTYPE html>
<html lang="pt-br">
<!-- <html lang="pt-br" data-bs-theme="dark"> OQUE DEIXA O UNDO ESCURO -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/login.css">
    <title>Login</title>
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="w-100 m-auto form-container">
        <form>
        <img src="../assets/images/logo/favicon.png" alt="Logo" class="mb-4" />
            <h1 class="h3 mb-3 fw-normal">Por favor, faça login</h1>
            <div class="form-floating mb-3">
                <input type="email" name="email"class="form-control" id="email" placeholder="seu-email@gmail.com" />
                <label for="floatingInput">Adicione o E-mail</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name='senha' class="form-control" id="senha" placeholder="senha" />
                <label for="floatingPassword">Senha</label>
            </div>
            <div class="form-check text-start my-3">
                <input type="checkbox" class="form-check-input" id="flexCheckDefault" />
                <label class="form-check-label" for="flexCheckDefault">Lembrar de mim</label>
            </div>
            <button class="btn btn-primary w-100 py-2">Entrar</button>
        </form>
    </main>
</body>
</html>
