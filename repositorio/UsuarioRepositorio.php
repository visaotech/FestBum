<?php
class UsuarioRepositorio
{
    private $conn;

    public function __construct($conn)
    {
        // Verifica se a conexão foi bem sucedida
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }
        $this->conn = $conn;
    }

    public function cadastrar(Usuario $usuario) {
        // Fazendo o hash da senha para armazená-la de forma segura
        $senhaHash = password_hash($usuario->getSenha(), PASSWORD_DEFAULT);

        // SQL de inserção
        $sql = "INSERT INTO usuario (primeironome, sobrenome, cidade, estado, cep, email, senha) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        // Prepara a consulta
        if ($stmt = $this->conn->prepare($sql)) {
            // Faz o binding das variáveis
            $stmt->bind_param("sssssss", 
                $usuario->getPrimeironome(), 
                $usuario->getSobrenome(), 
                $usuario->getCidade(), 
                $usuario->getEstado(), 
                $usuario->getCep(), 
                $usuario->getEmail(), 
                $senhaHash
            );

            // Executa a consulta
            if ($stmt->execute()) {
                // Caso a execução seja bem-sucedida, retorna true
                return true;
            } else {
                // Caso a execução falhe, retorna a mensagem de erro
                error_log("Erro ao cadastrar o usuário: " . $stmt->error);
                return "Erro ao cadastrar o usuário: " . $stmt->error;
            }
        } else {
            // Caso a preparação da consulta falhe
            error_log("Erro ao preparar a consulta: " . $this->conn->error);
            return "Erro ao preparar a consulta: " . $this->conn->error;
        }
    }
}
?>
