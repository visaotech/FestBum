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
        
        <form action="../controladora/processar-cadastro.php" method="POST">
            <img src="../assets/images/logo/favicon.png" alt="Logo" class="mb-4" />
            <h1 class="h3 mb-3 fw-normal">Por favor, faça seu cadastro</h1>
            <!-- Exemplo de campos -->
            <div class="row mb-3" >
                <div class="col-md-6">
                    <div class="form-floating">
                    <input type="text" name="primeironome" class="form-control" id="floatingNome" required placeholder="Primeiro Nome">
                        <label for="floatingNome">Primeiro Nome</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                    <input type="text" name="sobrenome" class="form-control" id="floatingSobrenome" required placeholder="Sobrenome">
                        <label for="floatingSobrenome">Sobrenome</label>
                    </div>
                </div>
            </div>

                <div class="col-md-6">
                    <div class="form-floating">
                    <input type="text" name="cidade" class="form-control" id="floatingCidade" required placeholder="Cidade">
                        <label for="floatingCidade">Cidade</label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating">
                    <input type="text" name="estado" class="form-control" id="floatingEstado" required placeholder="Estado">
                        <label for="floatingEstado">Estado</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                    <input type="text" name="cep"  class="form-control" id="floatingCEP" required placeholder="CEP">
                        <label for="floatingCEP">CEP</label>
                    </div>
                </div>
            </div>
              <div class="row mb-3">
                <div class="col-md-12">
                  <div class="form-floating">
                  <input type="email" name="email" class="form-control" id="floatingEmail" required placeholder="Email">
                    <label for="floatingEmail">Email</label>
                  </div>
                </div>
              </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating">
                    <input type="password" name="senha" class="form-control" id="floatingSenha" required placeholder="Senha">
                        <label for="floatingSenha">Senha</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                    <input type="password" name="confirmarsenha" class="form-control" id="floatingConfirmarSenha" required placeholder="Confirmar Senha">
                        <label for="floatingConfirmarSenha">Confirmar Senha</label>
                    </div>
                </div>
            </div>

            <div class="form-check text-start my-3">
                <input type="checkbox" class="form-check-input" id="flexCheckDefault" required>
                <label class="form-check-label" for="flexCheckDefault">Concordo com os termos e condições</label>
            </div>

            <?php 
          if(isset($_GET["erro"])){
              //echo "erro! senha e confirmar senha não são iguais";
          ?>
              <label for="erro">Senha e confirmar senha não são iguais</label>
          <?php } ?>

            <button type="submit" class="btn btn-primary w-100 py-2">Cadastrar</button>

      
        </form>
    </main>
</body>
</html>