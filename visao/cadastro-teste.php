<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/cadastro.css">
    <title>Cadastro</title>
</head>
<body class="d-flex justify-content-center align-items-center min-vh-100 bg-body-tertiary">
    <main class="form-container">
        <form>
            <img src="../assets/images/logo/favicon.png" alt="Logo" class="mb-4" />
            <h1 class="h3 mb-3 fw-normal">Por favor, faça seu cadastro</h1>

            <!-- Exemplo de campos -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingNome" placeholder="Primeiro Nome" required>
                        <label for="floatingNome">Primeiro Nome</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingSobrenome" placeholder="Sobrenome" required>
                        <label for="floatingSobrenome">Sobrenome</label>
                    </div>
                </div>
            </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingCidade" placeholder="Cidade" required>
                        <label for="floatingCidade">Cidade</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingEstado" placeholder="Estado" required>
                        <label for="floatingEstado">Estado</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingCEP" placeholder="CEP" required>
                        <label for="floatingCEP">CEP</label>
                    </div>
                </div>
            </div>
              <div class="row mb-3">
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="email" class="form-control" id="floatingEmail" placeholder="nome@exemplo.com" required>
                    <label for="floatingEmail">Email</label>
                  </div>
                </div>
              </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingSenha" placeholder="Senha" required>
                        <label for="floatingSenha">Senha</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingConfirmarSenha" placeholder="Confirmar Senha" required>
                        <label for="floatingConfirmarSenha">Confirmar Senha</label>
                    </div>
                </div>
            </div>

        

            <div class="form-check text-start my-3">
                <input type="checkbox" class="form-check-input" id="flexCheckDefault" required>
                <label class="form-check-label" for="flexCheckDefault">Concordo com os termos e condições</label>
            </div>

            <button class="btn btn-primary w-100 py-2">Cadastrar</button>
        </form>
    </main>
</body>
</html>
