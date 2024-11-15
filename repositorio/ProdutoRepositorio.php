<?php
class ProdutoRepositorio
{
    private $conn; // Sua conexão com o banco de dados

    // Constructor
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Cadastrar um novo produto
    public function cadastrar(Produto $produto)
    {
        $sql = "INSERT INTO produtos (tipo, nome, descricao, imagem, preco) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(
            "ssssd", 
            $produto->getTipo(),
            $produto->getNome(),
            $produto->getDescricao(),
            $produto->getImagemDiretorio(),
            $produto->getPreco()
        );

        $success = $stmt->execute();
        $stmt->close();

        return $success;
    }

    // Listar produtos do tipo Embalagens
    public function listarEmbalagens()
    {
        $sql = "SELECT * FROM produtos WHERE tipo = 'Embalagens' ORDER BY preco";
        $result = $this->conn->query($sql);

        $produtos = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $produtos[] = new Produto(
                    $row['id'], $row['tipo'], $row['nome'], 
                    $row['descricao'], $row['preco'], $row['imagem']
                );
            }
        }

        return $produtos;
    }

    // Atualizar um produto
    public function atualizarProduto(Produto $produto)
    {
        if (empty($produto->getImagem())) {
            $sql = "UPDATE produtos SET tipo = ?, nome = ?, descricao = ?, preco = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param(
                'sssdi',
                $produto->getTipo(),
                $produto->getNome(),
                $produto->getDescricao(),
                $produto->getPreco(),
                $produto->getId()
            );
        } else {
            $sql = "UPDATE produtos SET tipo = ?, nome = ?, descricao = ?, imagem = ?, preco = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param(
                'ssssdi',
                $produto->getTipo(),
                $produto->getNome(),
                $produto->getDescricao(),
                $produto->getImagemDiretorio(),
                $produto->getPreco(),
                $produto->getId()
            );
        }

        $resultado = $stmt->execute();
        $stmt->close();

        return $resultado;
    }

    // Listar produto do tipo Embalagens por ID
    public function listarEmbalagensPorId($id)
    {
        $sql = "SELECT * FROM produtos WHERE tipo = 'Embalagens' AND id = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $produto = null;

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $produto = new Produto(
                $row['id'], $row['tipo'], $row['nome'], 
                $row['descricao'], $row['preco'], $row['imagem']
            );
        }

        $stmt->close();

        return $produto;
    }

    // Excluir produto por ID
    public function excluirProdutoPorId($id)
    {
        $sql = "DELETE FROM produtos WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);

        $success = $stmt->execute();
        $stmt->close();

        return $success;
    }

    // Listar todos os produtos do tipo Adesivos
    public function listarAdesivos()
    {
        $sql = "SELECT * FROM produtos WHERE tipo = 'Adesivos' ORDER BY preco";
        $result = $this->conn->query($sql);

        $produtos = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $produtos[] = new Produto(
                    $row['id'], $row['tipo'], $row['nome'], 
                    $row['descricao'], $row['preco'], $row['imagem']
                );
            }
        }

        return $produtos;
    }
    public function listarAdesivosPorId($id)
    {
        $sql = "SELECT * FROM produtos WHERE tipo = 'Embalagens' AND id = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $produto = null;

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $produto = new Produto(
                $row['id'], $row['tipo'], $row['nome'], 
                $row['descricao'], $row['preco'], $row['imagem']
            );
        }

        $stmt->close();

        return $produto;
    }


    // Buscar todos os produtos
    public function buscarTodos()
    {
        $sql = "SELECT * FROM produtos ORDER BY tipo, preco";
        $result = $this->conn->query($sql);

        $produtos = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $produtos[] = new Produto(
                    $row['id'], $row['tipo'], $row['nome'], 
                    $row['descricao'], $row['preco'], $row['imagem']
                );
            }
        }

        return $produtos;
    }
}
?>
