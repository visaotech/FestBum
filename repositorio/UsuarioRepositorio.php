<?php
class UsuarioRepositorio
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function cadastrar(Usuario $usuario) {
        $senhaHash = password_hash($usuario->getSenha(), PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuario (primeironome, sobrenome, cidade, estado, cep, email, senha) VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssssss", 
            $usuario->getPrimeironome(), 
            $usuario->getSobrenome(), 
            $usuario->getCidade(), 
            $usuario->getEstado(), 
            $usuario->getCep(), 
            $usuario->getEmail(), 
            $senhaHash
        );

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
