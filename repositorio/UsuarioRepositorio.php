<?php
class UsuarioRepositorio
{
    private $conn; // Sua conexão com o banco de dados
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    function cadastrar(Usuario $usuario) {
        $senhaHash = password_hash($usuario->getSenha(), PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuario (nome, email, senha) VALUES 
            (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $usuario->getNome(), $usuario->getEmail(), $senhaHash);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    
}