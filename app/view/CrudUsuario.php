<?php
if (session_status () === PHP_SESSION_NONE) {
	session_start ();
}
if (! isset ( $_SESSION ['user'] ['idUsuario'] )) {
	header ( "Location: admin.php" );
	exit ();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <style>
        .preview-image {
            width: 200px;
            height: 200px;
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 5px;
            cursor: pointer;
            object-fit: cover;
        }
    </style>
</head>
<body>
 <button class="btn btn-secondary" onclick="window.location.href='admin.php'">
	Voltar
</button>
<div class="container mt-4">
    <h2>Gestão de Usuários</h2>
    <button class="btn btn-primary mb-3" id="btnAdicionarUsuario">Adicionar Usuário</button>
    <div id="emptyMessage" class="alert alert-info d-none">Nenhum usuário encontrado. Clique em "Adicionar Usuário" para começar!</div>
    <table id="userTable" class="display table table-bordered d-none" style="width:100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Perfil</th>
            <th>Ativo</th>
            <th>Foto</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<!-- Modal para Cadastro/Edição -->
<div class="modal fade" id="crudUsuarioModal" tabindex="-1" aria-labelledby="crudUsuarioModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crudUsuarioModalLabel">Dados do Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="userForm">
                    <input type="hidden" id="idUsuario" name="idUsuario" value="0">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Usuário" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email do Usuário" required>
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha:</label>
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
                    </div>
                    <div class="mb-3">
                        <label for="perfil" class="form-label">Perfil:</label>
                        <select class="form-select" id="perfil" name="perfil" required>
                            <option value="admin">Administrador</option>
                            <option value="usuario">Usuário</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="ativo" class="form-label">Ativo:</label>
                        <select class="form-select" id="ativo" name="ativo" required>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="image-container">
                            <img id="foto" name="foto" alt="Foto do Usuário" src="placeholder.png" class="preview-image">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSalvarUsuario" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {

    function clearFormData() {
        $('#idUsuario').val(0);
        $('#nome').val('');
        $('#email').val('');
        $('#senha').val('');
        $('#perfil').val('usuario');
        $('#ativo').val('1');
        $('#foto').attr('src', 'placeholder.png');
    }

    $('#btnAdicionarUsuario').on('click', function () {
        clearFormData();
        $('#crudUsuarioModal').modal('show');
    });

    const table = $('#userTable').DataTable({
        ajax: {
            url: '../controllers/CtrlUsuarios.php',
            type: 'GET',
            dataSrc: function (json) {
                if (json.length === 0) {
                    $('#emptyMessage').removeClass('d-none');
                    $('#userTable').addClass('d-none');
                } else {
                    $('#emptyMessage').addClass('d-none');
                    $('#userTable').removeClass('d-none');
                }
                return json;
            },
            error: function (xhr) {
                console.error('Erro ao carregar dados:', xhr.responseText);
            }
        },
        columns: [
            { data: 'idUsuario' },
            { data: 'nome' },
            { data: 'email' },
            { data: 'perfil' },
            { data: 'ativo', render: (data) => (data ? 'Sim' : 'Não') },
            { data: 'foto', render: (data) => `<img src="${data}" alt="Foto" style="width:50px;height:50px;">` },
            {
                data: null,
                render: function (data, type, row) {
                    return `
                        <button class="btn btn-warning btn-sm btn-edit" data-id="${row.idUsuario}" title="Editar">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button class="btn btn-danger btn-sm btn-delete" data-id="${row.idUsuario}" title="Excluir">
                            <i class="bi bi-trash"></i>
                        </button>`;
                }
            }
        ],
        emptyTable: "Nenhum produto encontrado.",
        loadingRecords: "Carregando..." 
    });

    $('#btnSalvarUsuario').click(function () {
        const formData = new FormData();
        formData.append('idUsuario', $('#idUsuario').val());
        formData.append('nome', $('#nome').val());
        formData.append('email', $('#email').val());
        formData.append('senha', $('#senha').val());
        formData.append('perfil', $('#perfil').val());
        formData.append('ativo', $('#ativo').val());
        formData.append('foto', $('#foto').attr('src'));
        $.ajax({
            url: '../controllers/CtrlUsuarios.php',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                alert('Usuário salvo com sucesso!');
                $('#crudUsuarioModal').modal('hide');
                table.ajax.reload();
            },
            error: function (xhr) {
                alert('Erro ao salvar o usuário!');
                console.error('Erro:', xhr.responseText);
            }
        });
    });

    $('.preview-image').click(function () {
        const clickedImg = $(this);
        const fileInput = $('<input>', { type: 'file', accept: 'image/*', style: 'display: none' });
        fileInput.on('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    clickedImg.attr('src', e.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
        fileInput.click();
    });

    $('#userTable').on('click', '.btn-edit', function () {
        const idUsuario = $(this).data('id');
        $.ajax({
            url: `../controllers/CtrlUsuarios.php`,
            data: { idUsuario: idUsuario },
            type: 'GET',
            success: function (data) {
                $('#idUsuario').val(data[0].idUsuario);
                $('#nome').val(data[0].nome);
                $('#email').val(data[0].email);
                $('#perfil').val(data[0].perfil);
                $('#ativo').val(data[0].ativo);
                $('#foto').attr('src', data[0].foto);
                $('#crudUsuarioModal').modal('show');
            },
            error: function (xhr) {
                alert('Erro ao carregar o usuário!');
                console.error('Erro:', xhr.responseText);
            }
        });
    });

    $('#userTable').on('click', '.btn-delete', function () {
        const idUsuario = $(this).data('id');
        if (confirm('Tem certeza que deseja excluir este usuário?')) {
            $.ajax({
                url: `http://localhost/FestBum/app/controllers/CtrlUsuarios.php`,
                data: { idUsuario: idUsuario },
                method: 'DELETE',
                success: function () {
                    table.ajax.reload();
                },
                error: function (xhr) {
                    alert('Erro ao excluir o usuário!');
                    console.error('Erro:', xhr.responseText);
                }
            });
        }
    });
});
</script>

</body>
</html>
