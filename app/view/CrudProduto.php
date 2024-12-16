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
    <title>Gestão de Produtos</title>
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
    <h2>Gestão de Produtos</h2>
    
	<button  class="btn btn-primary mb-3" id="btnAdicionarProduto"> Adicionar Produto </button>
	<div id="emptyMessage" class="alert alert-info d-none">Nenhum produto encontrado. Clique em "Adicionar Produto" para começar!</div>
    <table id="productTable" class="display table table-bordered d-none" style="width:100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Tipo</th>
            <th>Ativo</th>
            <th>Imagem 1</th>
            <th>Imagem 2</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<!-- Modal para Cadastro/Edição -->
<div class="modal fade" id="crudProdutoModal" tabindex="-1" aria-labelledby="crudProdutoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crudProdutoModalLabel">Dados do Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container crudProduto">
                    <div class="row">
                            <form id="productForm">
                                <input type="hidden" id="id" name="id" value="0">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Produto:</label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Produto" required>
                                </div>
                                <div class="mb-3">
                                    <label for="descricao" class="form-label">Descrição:</label>
                                    <textarea class="form-control" id="descricao" name="descricao" placeholder="Descrição do Produto" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="preco" class="form-label">Preço:</label>
                                    <input type="number" id="preco" name="preco" step="0.01" placeholder="0.00" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="quantidade" class="form-label">Quantidade:</label>
                                    <input type="number" id="quantidade" name="quantidade" min="1" step="1" placeholder="0" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tipo" class="form-label">Tipo:</label>
                                    <select class="form-select" id="tipo" name="tipo" required>
                                        <option value="Embalagens">Embalagens</option>
                                        <option value="Adesivos">Adesivos</option>
                                        <option value="Tags">Tags</option>
                                        <option value="Personalizados">Personalizados</option>
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
                                        <img id="img01" name="img01" alt="Imagem01" src="placeholder01.png" class="preview-image">
                                        <img id="img02" name="img02" alt="Imagem02" src="placeholder02.png" class="preview-image">
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSalvar" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {

	function clearFormData() {
		$('#id').val(0);
        $('#nome').val('');
        $('#descricao').val('');
        $('#preco').val(0);
        $('#quantidade').val(0);
        $('#tipo').val('');
        $('#ativo').val('S');
        $('#img01').attr('src','');
        $('#img02').attr('src',''); 
	}

	$('#btnAdicionarProduto').on('click', function () {
		  clearFormData();
		  $('#crudProdutoModal').modal('show');
	});

	const table = $('#productTable').DataTable({
        ajax: {
            url: '../controllers/CtrlProdutos.php',
            type: 'GET',
            dataSrc: function (json) {
                if (json.length === 0) {
                    $('#emptyMessage').removeClass('d-none');
                    $('#productTable').addClass('d-none');
                } else {
                    $('#emptyMessage').addClass('d-none');
                    $('#productTable').removeClass('d-none');
                }
                return json;
            },
            error: function (xhr) {
                console.error('Erro ao carregar dados:', xhr.responseText);
            }
        },
        columns: [
            { data: 'id' },
            { data: 'nome' },
            { data: 'descricao' },
            {
                data: 'preco',
                render: function (data) {
                    return new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(data);
                }
            },
            { data: 'quantidade' },
            { data: 'tipo' },
            { data: 'ativo', render: (data) => (data ? 'Sim' : 'Não') },
            { data: 'img01', render: (data) => `<img src="${data}" alt="Imagem 1" style="width:50px;height:50px;">` },
            { data: 'img02', render: (data) => `<img src="${data}" alt="Imagem 2" style="width:50px;height:50px;">` },
            {
                data: null,
                render: function (data, type, row) {
                    return `
                        <button class="btn btn-warning btn-sm btn-edit" data-id="${row.id}" title="Editar">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button class="btn btn-danger btn-sm btn-delete" data-id="${row.id}" title="Excluir">
                            <i class="bi bi-trash"></i>
                        </button>`;
                }
            }
        ],
        emptyTable: "Nenhum produto encontrado.",
        loadingRecords: "Carregando..." 
  
    });


    
    $('#btnSalvar').click(function () {
        const formData = new FormData();
        formData.append('id', $('#id').val());
        formData.append('nome', $('#nome').val());
        formData.append('descricao', $('#descricao').val());
        formData.append('preco', $('#preco').val());
        formData.append('quantidade', $('#quantidade').val());
        formData.append('tipo', $('#tipo').val());
        formData.append('ativo', $('#ativo').val());
        formData.append('img01', $('#img01').attr('src'));
        formData.append('img02', $('#img02').attr('src'));
        $.ajax({
            url: '../controllers/CtrlProdutos.php',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                alert('Produto salvo com sucesso!');
                $('#crudProdutoModal').modal('hide');
                // Recarrega a tabela
                $('#productTable').DataTable().ajax.reload();
            },
            error: function (xhr) {
                alert('Erro ao salvar o produto!');
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
    
    $('#productTable').on('click', '.btn-edit', function () {
        const idProduto = $(this).data('id');
        $.ajax({
            url: `../controllers/CtrlProdutos.php`,
			data: { id: idProduto },
            type: 'GET',
            success: function (data) {
                try {
                    console.table(data);
            		$('#id').val(data[0].id);
                    $('#nome').val(data[0].nome);
                    $('#descricao').val(data[0].descricao);
                    $('#preco').val(data[0].preco);
                    $('#quantidade').val(data[0].quantidade);
                    $('#tipo').val(data[0].tipo);
                    $('#ativo').val(data[0].ativo);
                    $('#img01').attr('src',data[0].img01);
                    $('#img02').attr('src',data[0].img02); 
                    $('#crudProdutoModal').modal('show');
                } catch (error) {
                    console.error('Erro ao processar os dados:', error);
                    alert('Ocorreu um erro ao carregar os dados. Tente novamente.');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("Erro na requisição:", textStatus, errorThrown);
                alert('Não foi possível carregar as informações do produto. Verifique sua conexão.');
            },
        });
    });
    
    $('#productTable').on('click', '.btn-delete', function () {
        const idProduto = $(this).data('id');
        if (confirm('Tem certeza que deseja excluir este produto?')) {
            console.log(`${id}`);
            $.ajax({
                url: `../controllers/CtrlProdutos.php`,
                data: { id: idProduto }, 
                method: 'DELETE',
                success: function () {
                    table.ajax.reload();
                },
                error: function (xhr, status, error) {
                    console.error('Erro ao excluir produto:', error);
                    alert('Não foi possível excluir o produto. Por favor, tente novamente.');
                }
            });
        }
    });
});
</script>
</body>
</html>
