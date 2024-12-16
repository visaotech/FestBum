<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <div id="authForm" class="d-none">
        <div class="card p-4 mx-auto" style="max-width: 400px;">
            <h3 class="text-center mb-4">Login</h3>
            <form id="loginForm">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Digite seu email" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" id="senha" name="senha" class="form-control" placeholder="Digite sua senha" required>
                </div>
                <div class="d-grid">
                    <button type="submit" id="btnLogin" class="btn btn-primary">Entrar</button>
                </div>
            </form>
            <div id="loginMessage" class="alert mt-3 d-none"></div>
        </div>
    </div>

    <div id="userDetails" class="d-none">
        <div class="card p-4 mx-auto" style="max-width: 600px;">
            <h3 class="text-center mb-4">Bem-vindo!</h3>
            <div class="text-center">
                <img id="userFoto" class="rounded-circle mb-3" alt="Foto do Usuário" width="100" height="100">
                <h4 id="userNome"></h4>
                <p id="userEmail"></p>
                <p><strong>Perfil:</strong> <span id="userPerfil"></span></p>
                
            </div>
            <div class="d-grid gap-2 mt-4">
                <button class="btn btn-primary" onclick="window.location.href='../view/CrudUsuario.php'">
                    Gerenciar Usuários
                </button>
                <button class="btn btn-secondary" onclick="window.location.href='../view/CrudProduto.php'">
                    Gerenciar Produtos
                </button>
                <button id="btnLogout" class="btn btn-danger">Sair</button>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function () {

    function checkAuth() {
        $.ajax({
            url: '../controllers/CtrlLogin.php',
            type: 'GET',
            success: function (response) {
                if (!response.idUsuario) {
                    // Usuário não autenticado
                    $('#authForm').removeClass('d-none');
                    $('#userDetails').addClass('d-none');
                } else {
                    // Usuário autenticado
                    $('#authForm').addClass('d-none');
                    $('#userDetails').removeClass('d-none');
                    $('#userFoto').attr('src', response.foto || 'placeholder.png');
                    $('#userNome').text(response.nome);
                    $('#userEmail').text(response.email);
                    $('#userPerfil').text(response.perfil);
                }
            },
            error: function (xhr) {
                console.error('Erro ao verificar autenticação:', xhr.responseText);
            }
        });
    }

    checkAuth();

    $('#loginForm').on('submit', function (e) {
        e.preventDefault();

        const email = $('#email').val();
        const senha = $('#senha').val();

        $.ajax({
            url: '../controllers/CtrlLogin.php',
            type: 'POST',
            data: { email, senha },
            success: function (response) {
                if (response.status === "true") {
                    $('#loginMessage')
                        .removeClass('d-none alert-danger')
                        .addClass('alert-success')
                        .text(response.msg);

                    // Recarregar para atualizar o estado de autenticação
                    setTimeout(function () {
                        checkAuth();
                    }, 2000);
                } else {
                    $('#loginMessage')
                        .removeClass('d-none alert-success')
                        .addClass('alert-danger')
                        .text(response.msg);
                }
            },
            error: function (xhr) {
                console.error('Erro ao processar login:', xhr.responseText);
                $('#loginMessage')
                    .removeClass('d-none alert-success')
                    .addClass('alert-danger')
                    .text('Erro ao processar login. Tente novamente mais tarde.');
            }
        });
    });

    $('#btnLogout').on('click', function () {
        $.ajax({
            url: '../controllers/CtrlLogin.php',
            type: 'POST',
            data: { email: '', senha: '' }, 
            success: function (response) {
                if (response.status === "true") {
                    location.reload(); 
                } else {
                    alert('Erro ao fazer logout. Tente novamente.');
                }
            },
            error: function (xhr) {
                console.error('Erro ao processar logout:', xhr.responseText);
                alert('Erro ao processar logout. Tente novamente.');
            }
        });
    });
});

</script>
</body>
</html>
